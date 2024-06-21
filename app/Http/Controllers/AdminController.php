<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    function index() {
        // $totalclientCount = Client::count();
        // $clientCount = Client::where('status', 1)->count();
        // return view('admin.dashboard', compact('clientCount', 'totalclientCount'));


        $totalclientCount = Cache::rememberForever('total_client', function () {
            return Client::count();
        });
        $clientCount = Cache::rememberForever('act_users',  function () {
            return Client::where('status', 1)->count();
        });

        // $totalclientCount = Redis::get('laravel_database_total_client');
        // $clientCount = Redis::get('laravel_database_client');

        // if (!empty($totalclientCount) || !empty($clientCount)) {
        //     return view('admin.dashboard', compact('clientCount', 'totalclientCount'));
        // } else{
        //     // $totalclientCount = Client::count();
        //     // $clientCount = Client::where('status', 1)->count();
        //     // Redis::set('total_client', $totalclientCount);
        //     // Redis::set('client', $clientCount);

            return view('admin.dashboard', compact('clientCount', 'totalclientCount'));


        // }
        }




}
