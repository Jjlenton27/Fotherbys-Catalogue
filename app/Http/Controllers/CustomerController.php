<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Lot;
use App\Models\SellRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller{

    // https://laravel.com/learn/getting-started-with-laravel/what-is-mvc
    // https://laravel.com/docs/8.x/views#passing-data-to-views


    public function index(){
        return view('pages.home');
    }

    public function lot(string $id){
        $lot = Lot::where('id', '=', $id)->select(['title', 'sub_title', 'price', 'description', 'summary', 'img'])->get();
        return view('pages.lot', ['lot' => $lot[0]]); // DB request returns arrrary with one element, pass single elemnt thats at index 0
    }

    public function auctions(){
        $auctions = Auction::where('date', '>', Carbon::now()->toDateString())->orderBy('date', 'asc')->get();
        return view('pages.auctions', ['auctions' => $auctions]);
    }

    public function redirectToAuction(){
        return redirect('/auctions');
   }

    public function catalouge(string $id){
        //$lots = null;
        if($id == -1){
            $lots = Lot::all();
            $isCatalouge = false;
            $catalouge = null;
        }

        else{
            $lots = Lot::where('auction_id', '=', $id)->select(['id', 'title', 'sub_title', 'price', 'description', 'summary', 'img'])->get();
            $isCatalouge = true;
            $catalouge = Auction::find($id);
        }

        return view('pages.catalouge', ['lots' => $lots, 'catalouge' => $catalouge, 'isCatalouge' => $isCatalouge]);
    }

    public function catalougePOST(string $id, Request $request){
        if($id == -1){
            $lots = Lot::all();
            $isCatalouge = false;
            $catalouge = null;
        }

        else{
            $lots = Lot::where('auction_id', '=', $id)->select(['id', 'title', 'sub_title', 'price', 'description', 'summary', 'img'])->get();
            $isCatalouge = true;
            $catalouge = Auction::find($id);
        }

        return view('pages.catalouge', ['lots' => $lots, 'catalouge' => $catalouge, 'isCatalouge' => $isCatalouge]);
    }

    public function sell(){
        return view('pages.sell');
    }

    public function submitSellRequest(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'summary' => 'string',
            'description' => 'required|string',
            'price' => 'required', //needs data type restrcition
            'resprice' => '', //needs data type restrcition
        ]);

        SellRequest::create([
            'title' => $validated['title'],
            'sub_title' => $validated['subtitle'],
            'price' => $validated['price'],
            'description' => $validated['description'], //needs p tag parsing
            'summary' => $validated['summary'],
            'reserve_price' => $validated['resprice'],

            'user_id' =>  session('user_id'),
        ]);

        return redirect('/sell');
    }

    public function account(){
        $user_id = session('user_id', '-1'); //get user id defauntling to -1
        if($user_id == -1){
            return redirect('/login');
        }

        else{
            $notification_setting = User::find(session('user_id'))->notification_preference;
            return view('pages.account', ['notification_setting' => $notification_setting]);
        }
    }

    public function register(){
            return view('pages.register');
    }

    public function DBCreate(){
        User::create([
            'access_level' => 1,
            'first_name' => "Jack",
            'surname' => "Lenton",
            'address' => "123 Medival Street",
            'town' => "Fantasyham",
            'postcode' => "FA15JJ",
            'email' => 'whatisthiswitchcraft@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'access_level' => 2,
            'first_name' => "Admin",
            'surname' => "Adminson",
            'address' => "456 Admin Street",
            'town' => "Workton",
            'postcode' => "AD13NM",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        return view('pages.home');
    }
}
