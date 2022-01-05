<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackages extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'description',
        'featured_event',
        'language',
        'foods',
        'departure_date',
        'duration',
        'type',
        'price'
    ];

    protected $hidden = [

    ];


    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'transaction_id', 'id');
    }

}