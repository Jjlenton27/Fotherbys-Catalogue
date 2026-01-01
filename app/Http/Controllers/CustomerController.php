<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CustomerController extends Controller{

    // https://laravel.com/learn/getting-started-with-laravel/what-is-mvc
    // https://laravel.com/docs/8.x/views#passing-data-to-views


    public function index(){
        return view('pages.home');
    }

    public function lot(){
            $lotInfo = [
                'title' => "PLACEHOLDER NAME",
                'subtitle' => "author name or smth",
                'description' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus voluptatum eius ullam incidunt! Aperiam quasi deleniti rerum totam esse, blanditiis soluta hic magni, cumque quos dolor qui perferendis alias labore!",
                'price' => 20000,
            ];

        return view('pages.lot', ['info' => $lotInfo]);
    }

    public function auctions(){
        $auctions = Auction::where('date', '>', Carbon::now()->toDateString())->orderBy('date', 'asc')->get();
        //$auctions =  DB::table("auctions")->where('date', '>', Carbon::now()->toDateString());
        return view('pages.auctions', ['auctions' => $auctions]);
    }

    public function catalouge(){
        return view('pages.catalouge');
    }

    public function sell(){
        return view('pages.sell');
    }

    public function account(){
        return view('pages.account');
    }
}
