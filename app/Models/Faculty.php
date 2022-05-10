<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        "picture",
        "number",
        "first",
        "last",
        "middle",
        "extension",
        "birthdate",
        "place",
        "sex",
        "civil",
        "height",
        "weight",
        "blood",
        "gsis",
        "pagibig",
        "philhealth",
        "sss",
        "tin",
        "citizenship",
        "rhouse",
        "rstreet",
        "rvillage",
        "rbarangay",
        "rcity",
        "rprovince",
        "rzip",
        "phouse",
        "pstreet",
        "pvillage",
        "pbarangay",
        "pcity",
        "pprovince",
        "pzip",
        "telephone",
        "mobile",
        "alternate",
    ];

    public function getFullNameAttribute()
    {
        if ($this->middle_initial) {
            return "$this->first $this->middle $this->last";
        }
        return "$this->first $this->last";
    }

    public function getAgeAttribute()
    {
        $date = Carbon::parse($this->birthdate . ' 00:00:00');
        $now = Carbon::now();
        return  $date->diffInYears($now);
    }


    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
