<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_report extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'postion',
        'login_logout',
    ];

}
