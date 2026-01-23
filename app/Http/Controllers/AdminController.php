<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Lot;
use App\Models\SellRequest;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    // https://laravel.com/learn/getting-started-with-laravel/what-is-mvc
    // https://laravel.com/docs/8.x/views#passing-data-to-views


    public function index(){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else{
            $contactRequests = ContactRequest::where('responded', '=', '0')->get();
            $sellRequests = SellRequest::where('status', '=', '0')->get();
            foreach($sellRequests as $sellRequest){
                $sellRequest->user = User::where('id', '=', $sellRequest->user_id)->select('email')->get()[0];
            }
            return view('pages.admin.home', ['sellRequests' => $sellRequests, 'contactRequests' => $contactRequests]);
        }
    }

    public function markResponded($id){
        $contactRequest = ContactRequest::find($id);
        $contactRequest->responded = true;
        $contactRequest->save();
        return redirect('/admin');
    }

    public function sellRequest(string $id){
        $sellRequest = SellRequest::where('id', '=', $id)->select(['id', 'title', 'sub_title', 'price', 'category', 'description', 'summary'])->get()[0]; // DB request returns arrrary with one element, pass single elemnt thats at index 0
        $sellRequest->user = User::where('id', '=', $id)->select('email')->get()[0];
        return view('pages.admin.sellrequest', ['sellRequest' => $sellRequest]);
    }

    public function sellRequestAction(Request  $request){
        if($request->verdict == "approve"){
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'string|max:255',
                'summary' => 'string',
                'description' => 'required|string',
                'category' => 'required',
                'seller' => 'required|string|email|max:255',
                'price' => 'required', //needs data type restrcition
            ]);

            $validated['seller_id'] = User::where('email',  '=', $validated['seller'])->select('id')->get()[0]->id;
            Lot::create([
                'title' => $validated['title'],
                'sub_title' => $validated['subtitle'],
                'price' => $validated['price'],
                'category' => $validated['category'],
                'description' => $validated['description'], //needs p tag parsing
                'summary' => $validated['summary'],
                'img' => "GOTHIC ARMOUR", //uuuuuuhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
                'user_id' =>  $validated['seller_id'],
            ]);

            $sellRequest = SellRequest::find($request->id);
            $sellRequest->status = 1;
            $sellRequest->save();
        }

        else{
            $sellRequest = SellRequest::find($request->id);
            $sellRequest->status = -1;
            $sellRequest->save();
        }


        return redirect('/admin');
    }

    public function lot($id, $updated = null){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else{
            $lot = Lot::where('id', '=', $id)->select(['id', 'title', 'sub_title', 'price', 'category', 'description', 'summary', 'user_id', 'img', 'auction_id'])->get()[0]; // DB request returns arrrary with one element, pass single elemnt thats at index 0
            $lot->user = User::where('id', '=', $lot->user_id)->select('email')->get()[0];
            return view('pages.admin.lot', ['lot' => $lot, 'updated' => $updated]);
        }
    }

    public function createlot(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'summary' => 'string',
            'description' => 'required|string',
            'category' => 'required',
            'seller' => 'required|string|email|max:255',
            'price' => 'required', //needs data type restrcition
        ]);

        //var_dump(User::where('email',  '=', $validated['seller'])->select('id')->get()[0]->id);
        $validated['seller_id'] = User::where('email',  '=', $validated['seller'])->select('id')->get()[0]->id;
        Lot::create([
            'title' => $validated['title'],
            'sub_title' => $validated['subtitle'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'description' => $validated['description'], //needs p tag parsing
            'summary' => $validated['summary'],
            'img' => "GOTHIC ARMOUR", //uuuuuuhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
            'user_id' =>  $validated['seller_id'],
        ]);

        return redirect('/auctions');
    }

    public function updatelot(Request $request){
        Log::info("lot request");

        //https://stackoverflow.com/questions/54026615/how-to-upload-an-image-using-laravel

        $validated = $request->validate([
            'id' => 'required', //needs data type restrcition
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'summary' => 'string',
            'description' => 'required|string',
            'seller' => 'required|string|email|max:255',
            'category' => 'required',
            'auction' => 'required', //needs data type restrcition
            'price' => 'required', //needs data type restrcition
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120', //???
        ]);

        // https://laravel.com/docs/12.x/validation#validation-error-response-format

        // https://laravel.com/docs/12.x/eloquent#updates

        //moves  image into public/images
        if(isset($validated['image'])){
            $imageName = 'lotImg'.$validated['id'].'.'.request()->$validated['image']->getClientOriginalExtension();
            request()->$validated['image']->move(public_path('images'), $imageName);
        }

        $lot = Lot::find($validated['id']);
        $lot->title = $validated['title'];
        $lot->sub_title = $validated['subtitle'];
        $lot->summary = $validated['summary'];
        $lot->category = $validated['category'];
        $lot->description = $validated['description']; //NEED PROCESSING
        $lot->user_id = User::where('email',  '=', $validated['seller'])->select('id')->get()[0]->id;
        $lot->auction_id = $validated['auction'];
        $lot->price = $validated['price'];

         if(isset($validated['image'])){
            $lot->img = $imageName;
        }
        $lot->save();

        return redirect('/admin/lot/'.$validated['id'].'/true');
    }

    public function deletelot(string $id, Request $request){
        Lot::find($id)->delete();
        return redirect('/auctions');
    }

    public function auction(string $id){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else{
            $auction = Auction::where('id', '=', $id)->select(['id', 'title', 'summary', 'description', 'auction_date', 'auction_time'])->get()[0];
            return view('pages.admin.auction', ['auction' => $auction]);
        }
    }

    public function createauction(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'date' => 'required',
            'time' => 'required', //needs data type restrcition
        ]);

        Auction::create([
            'title' => $validated['title'],
            'description' => $validated['description'], //needs p tag parsing
            'summary' => $validated['summary'],
            'auction_date' => $validated['date'],
            'auction_time' => $validated['time'],
        ]);

        return redirect('/auctions');
    }

   public function updateauction(string $id, Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'date' => 'required',
            'time' => 'required', //needs data type restrcition
        ]);

        // https://laravel.com/docs/12.x/validation#validation-error-response-format

        Log::info("auction validated");

        // https://laravel.com/docs/12.x/eloquent#updates

        $auction = Auction::find($id);
        $auction->title = $validated['title'];
        $auction->summary = $validated['summary'];
        $auction->description = $validated['description']; //NEED PROCESSING
        $auction->auction_date = $validated['date'];
        $auction->auction_time = $validated['time'];

        $auction->save();

        Log::info(message: "auction saved");
        //return redirect('/');

        return redirect('/admin/auction/'.$id.'/true');
    }

    public function deleteauction(string $id, Request $request){
        Auction::find($id)->delete();
        return redirect('/auctions');
    }
}
