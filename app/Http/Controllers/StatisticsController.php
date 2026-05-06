<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(){
        $clients= Client::count();
        $products= Product::count();
        $users= User::count();
        return response()->json(['data' => [
            'client_count' => $clients,
            'product_count' => $products,
            'user_count' => $users
        ]]);
    }
}
