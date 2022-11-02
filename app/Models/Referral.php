<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    public function referral_services()
    {
        return $this->hasMany(ReferralService::class,'referral_id');
    }
}
