<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Lot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{

    // https://laravel.com/learn/getting-started-with-laravel/what-is-mvc
    // https://laravel.com/docs/8.x/views#passing-data-to-views


    public function index(){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else
            return view('pages.admin.home');
    }

    public function lot($id, $updated = null){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else{
            $lot = Lot::where('id', '=', $id)->select(['id', 'title', 'sub_title', 'price', 'description', 'summary', 'user_id', 'img', 'auction_id'])->get()[0]; // DB request returns arrrary with one element, pass single elemnt thats at index 0
            $lot->user = User::where('id', '=', $lot->user_id)->select('email')->get()[0];
            return view('pages.admin.lot', ['lot' => $lot, 'updated' => $updated]);
        }
    }

    public function updatelot(Request $request){
        Log::info("lot request");

        $validated = $request->validate([
            'id' => 'required', //needs data type restrcition
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'seller' => 'required|string|email|max:255',
            'auction' => 'required', //needs data type restrcition
            'price' => 'required', //needs data type restrcition
        ]);

        // https://laravel.com/docs/12.x/validation#validation-error-response-format

        Log::info("lot validated");
        Log::info($validated['seller']);
        Log::info(User::where('email',  '=', $validated['seller'])->select('id')->get()[0]->id);

        // https://laravel.com/docs/12.x/eloquent#updates

        $lot = Lot::find($validated['id']);
        $lot->title = $validated['title'];
        $lot->sub_title = $validated['subtitle'];
        $lot->summary = $validated['summary'];
        $lot->description = $validated['description']; //NEED PROCESSING
        $lot->user_id = User::where('email',  '=', $validated['seller'])->select('id')->get()[0]->id;
        $lot->auction_id = $validated['auction'];
        $lot->price = $validated['price'];

        $lot->save();

        Log::info("lot saved");
        //return redirect('/');

        return redirect('/admin/lot/'.$validated['id'].'/true');
    }

    public function auction(string $id){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else{
            $auctions = Auction::where('id', '=', $id)->select(['title', 'summary', 'description', 'auction_date', 'auction_time'])->get();
            return view('pages.admin.auction', ['auction' => $auctions]);
        }
    }
}
