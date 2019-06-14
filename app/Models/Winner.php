<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $table = 'winners';

    protected $fillable = [
        'user_id', 'prize_type', 'number'
    ];

    public static $prize_type = [
        1 => 'Grand Prize',
        2 => 'Second Prize',
        3 => 'Third Prize',
        // 'second_prize_01' => 'Second Prize - 1st Winner',
        // 'second_prize_02' => 'Second Prize - 2nd Winner',
        // 'third_prize_01' => 'Third Prize - 1st Winner',
        // 'third_prize_02' => 'Third Prize - 2nd Winner',
        // 'third_prize_03' => 'Third Prize - 3rd Winner'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
