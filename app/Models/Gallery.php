<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable=['slug','point_title','blog_type','image','image_alt','description','seo_title','seo_description','middle_description','bottom_description','keyword','meta_keyword','status','publish_date','title','image_credit','author','image_caption'];

}
