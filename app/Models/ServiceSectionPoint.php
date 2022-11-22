<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSectionPoint extends Model
{
    use HasFactory;

    public function service_section()
    {
        return $this->belongsTo(ServiceSection::class);
    }
}
