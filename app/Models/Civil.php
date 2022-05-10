<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Civil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        "career",
        "rating",
        "date",
        "place",
        "lnumber",
        "ldate",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
