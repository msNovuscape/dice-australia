<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = "about_us";

    public function about_us_points(){
        return $this->hasMany(AboutUsPoint::class);
    }
}
