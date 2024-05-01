<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $lstPrd = Product::all();
        // dd($lstPrd);

        $data = [
            'lstPrd' => $lstPrd,
            'title' => 'day la HomePage',
        ];

        return view('homepage', $data);
    }
}
