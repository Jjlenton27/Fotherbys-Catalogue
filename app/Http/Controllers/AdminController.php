<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Lot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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

    public function lot(string $id){
        if(session("user_id") == -1 || session("access_level") != 2)
            return redirect('/login');
        else{
            $lot = Lot::where('id', '=', $id)->select(['title', 'sub_title', 'price', 'description', 'summary', 'img'])->get();
            return view('pages.admin.lot', ['lot' => $lot[0]]); // DB request returns arrrary with one element, pass single elemnt thats at index 0
        }
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
