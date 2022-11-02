<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function service_section_point(){
        return $this->hasMany(ServiceSectionPoint::class);
    }
}
