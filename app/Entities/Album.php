<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Support\UuidScopeTrait;

use App\User;
use App\Photo;

class Album extends Model
{
    protected $fillable = [
        'user_id', 'album_name', 'album_description',
        'cover_picture','privacy','album_date','album_venue',
        //  'created_by','updated_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\Entities\User','id');
    }
    public function photos()
    {
        return $this->hasMany('App\Entities\Photo','id');
    }
}
