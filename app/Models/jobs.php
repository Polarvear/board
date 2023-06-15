<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;
    // protected $connection = 'board';
    protected $table = 'member';

    public static function getData() {
        return self::all();
    }
    protected $fillable = [
        'process',
        'company',
        'team',
        'receive_time',
        'start_time',
        'work_status',
        'done_time',
        'request_time',
        'checker',
        'confirm_done_time',
        'modify_list',
        'modify_time',
        'file_extension'
  ];
}
