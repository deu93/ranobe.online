<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIp extends Model
{
    use HasFactory;

    protected $table = 'users_ip';

    protected $fillable = [
        'ip_address',
        'book_id',
    ];
}
