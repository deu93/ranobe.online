<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChapterIp extends Model
{
    use HasFactory;

    protected $table = 'user_chapter_ips';

    protected $fillable = [
        'ip_address',
        'chapter_id',
    ];
}
