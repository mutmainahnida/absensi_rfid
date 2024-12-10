<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attendance extends Model
{
    protected $fillable = ['uid', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
}
