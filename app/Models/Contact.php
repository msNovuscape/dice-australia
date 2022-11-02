<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['fullname','email','service_id','phone','message','status','created_at'];

    public function service(){
        return $this->belongsto(Service::class);
    }

}
