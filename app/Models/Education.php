<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    public $table = "educations";
    protected $fillable = [
        'user_id',
        "name",
        "course",
        "level",
        "from",
        "to",
        "units",
        "honors",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
