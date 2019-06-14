<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winner;
use App\Models\WinningNumber;

class MemberController extends Controller
{
    public function create()
    {
        $is_finish = Winner::all()->count() > 0;

        $winning_numbers = WinningNumber::where('user_id', auth()->user()->id)
                            ->orderBy('created_at', 'desc')
                            ->pluck('number')
                            ->toArray();
        $winners = Winner::all();
        $prize_type_arr = Winner::$prize_type;

        return view('member.index', compact('is_finish', 'winning_numbers', 'winners', 'prize_type_arr'));
    }

    public function store()
    {
        $numbers = WinningNumber::pluck('number')->toArray();

        do{
            $number = rand(1000, 9999);
        }while(in_array($number, $numbers));

        $winning_number = new WinningNumber();
        $winning_number->user_id = auth()->user()->id;
        $winning_number->number = $number;
        $winning_number->save();

        return redirect()->back();
    }
}
