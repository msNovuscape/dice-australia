<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoTitle extends Model
{
    use HasFactory;
    protected $fillable = ['seo_title','seo_type','seo_description','keyword','meta_keyword','status'];
}
