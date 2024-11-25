<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;


class Album extends Model{
    protected $fillable = ['title', 'artist', 'year', 'cover'];
    public static function getAlbum() {
        return DB::select("SELECT a.id, title, cover, artist, a.year
                from album a
                ORDER BY a.year
               ");

    }


    public static function getallMusicianOf($id) { 
        
        return DB::select("SELECT m.id,m.name,m.firstname
                from musician m
                join lineup l ON m.id=l.musician
                join album a ON l.album= a.id
                WHERE a.id = ?", [$id]);
    } 


    public static function getDiscography($id){ 
        
        return DB::select("SELECT m.id as musId,m.name, m.firstname, a.id as albumId, a.title, a.cover, a.artist, a.year 
                from musician m
                join lineup l ON m.id=l.musician
                join album a ON l.album= a.id
                WHERE m.id = ?", [$id]);
    }

    public static function getMusicianAPI($id){ 
        
        return DB::select("SELECT a.id as albumId, a.title, a.cover, a.artist, a.year 
        from musician m
        join lineup l ON m.id=l.musician
        join album a ON l.album= a.id
        WHERE m.id = ?
        ORDER BY year ASC
        ", [$id]
        
    );
    }

    public static function getMusicianFiltre(){
           
        return DB::select("SELECT id as musId,name, firstname
        from musician 
        ORDER BY name ASC");
    } 

    
}