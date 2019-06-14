<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winner;
use App\Models\WinningNumber;
use App\Http\Requests\DrawWinnerRequest;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function create()
    {
        $winners = Winner::orderBy('prize_type')->get();
        $winner_prize_type = $winners->unique('prize_type')->pluck('prize_type')->toArray();
        
        $prize_type = Winner::$prize_type;

        $prize_type_arr = [];
        foreach($prize_type as $key => $value){
            $prize_type_arr[$key] = [
                'name' => $value,
                'not_available' => in_array($key, $winner_prize_type)
            ];
        }

        return view('admin.index', compact('prize_type_arr', 'winners'));
    }

    public function store(DrawWinnerRequest $request)
    {
        $winner_in_list = Winner::pluck('user_id')->toArray();

        switch($request->prize_type){
            case 1:
                $winning_numbers = WinningNumber::selectRaw('user_id, count(id) as counter, group_concat(number) as numbers')
                                ->whereNotIn('user_id', $winner_in_list)
                                ->groupBy('user_id')
                                ->get();
                
                //find random winner
                if($winning_numbers){
                    $winner = $winning_numbers->where('counter', $winning_numbers->max('counter'))->random();
                
                    $numbers = explode(',', $winner->numbers);
                    $grand_winner = new Winner();
                    $grand_winner->user_id = $winner->user_id;
                    $grand_winner->prize_type = $request->prize_type;
                    $grand_winner->number = $numbers[array_rand($numbers, 1)];
                    $grand_winner->save();
                }
                break;
            default:
                $random = $request->prize_type;

                $winning_numbers = WinningNumber::selectRaw('user_id, group_concat(number) as numbers')
                            ->whereNotIn('user_id', $winner_in_list)
                            ->groupBy('user_id')
                            ->get();
                
                $get_random_winner = $winning_numbers->random($random);
                
                $result = [];
                foreach($get_random_winner as $winner){
                    $numbers = explode(',', $winner->numbers);

                    array_push($result, [
                        'user_id' => $winner->user_id,
                        'prize_type' => $request->prize_type,
                        'number' => $numbers[array_rand($numbers, 1)]
                    ]);
                }

                Winner::insert($result);
                break;
        }

        return redirect()->back();
    }
}
