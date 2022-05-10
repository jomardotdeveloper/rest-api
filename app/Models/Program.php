<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        "from",
        "to",
        "title",
        "hours",
        "ld",
        "sponsor",
        "cover",
        "cert",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
