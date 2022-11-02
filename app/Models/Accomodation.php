<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;
    protected $fillable=['title','slider_image','status','address','phone','email','website'];

    public function accommodation_features()
    {
        return $this->hasMany(AccomodationFeature::class);
    }

    public function accommodation_slider_titles()
    {
        return $this->hasMany(AccomodationSliderTitle::class);
    }

    public function accommodation_informations()
    {
        return $this->hasMany(AccomodationInformation::class);
    }
    public function accommodation_images()
    {
        return $this->hasMany(AccomodationImage::class);
    }
}
