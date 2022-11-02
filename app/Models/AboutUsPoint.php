<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPoint extends Model
{
    use HasFactory;
    protected $table = "about_us_points";

    public function about_us(){
        return $this->belongsto(AboutUs::class);
    }
}
