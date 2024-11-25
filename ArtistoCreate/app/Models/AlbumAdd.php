<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumAdd extends Model
{
    protected $table = 'album'; // Specify the table name for the Serie model
    protected $fillable = ['id', 'artist', 'title', 'year', 'cover'];
    
}
