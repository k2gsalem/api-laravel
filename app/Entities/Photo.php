<?php

namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use App\Support\UuidScopeTrait;
use App\Album;

class Photo extends Model
{
    protected $fillable = [
        'photo', 'album_id', 'photo_description','privacy','type','path'
    ];
    public function album()
    {
        return $this->belongsTo('App\Album','album_id');
    }
}
