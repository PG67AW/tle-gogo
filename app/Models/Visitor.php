<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'location',
        'city',
        'region',
        'country',
        'postal',
        'timezone',
        'currency',
    ];

    // public function addIp($ip)
    // {
    //     $this->create(['ip_address', $ip]);
    // }

}