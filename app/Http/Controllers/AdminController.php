<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        $totalclientCount = Client::count(); // Get the count of users
        $clientCount = Client::where('status', 1)->count(); // Get the count of users
        return view('admin.dashboard', compact('clientCount', 'totalclientCount')); // Pas
    }
}
