<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'sighting',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'zipcode',
        'country',
        'description',
        'status',
        'slug',
        'latitude',
        'longitude',
        'visitor',
        'user_id',
    ];
}
