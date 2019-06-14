<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winner;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $winners = Winner::all();
        $prize_type_arr = Winner::$prize_type;

        return view('home', compact('winners', 'prize_type_arr'));
    }
}
