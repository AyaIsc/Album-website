<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

use DateTime;

class AlbumCtrl extends Controller
{
    public function getAlbumCtrl()
    {
        $albums = Album::getAlbum();
        $arrayAlbums = []; 
        $albumMusicians = [];
        
        foreach ($albums as $album) {
            $arrayAlbums[] = (array)$album; // Cast the album object to an array
            $alId= $album->id;
            $musicians = Album::getallMusicianOf($alId) ;

            $albumMusicians[$album->id] = $musicians;
            
        }
    
        return view("albums", compact("arrayAlbums","albumMusicians"));
    }

    public function getallMusicianOf($id) { 
        return Album::getallMusicianOf($id); 
    }

    public function getMusicianDisc($id){ 
    
        $discography = Album::getDiscography($id); 
        $albumMusiciansDisc = [];
        foreach ($discography as $album) {
          $alId= $album->albumId;
          $musicians = Album::getallMusicianOf($alId) ; 
      
          $albumMusiciansDisc[$album->albumId] = $musicians;
        }
        return view("discography", compact("discography","albumMusiciansDisc")); 
    } 
  
    public function getAlbumsAPI($id){ 
    
        $discography = Album::getMusicianAPI($id); 
    
        return response()->json($discography);
      
      
    }
    public function getMusicianFilter(){
        $musicians = Album::getMusicianFiltre(); 
        return view("musician", compact("musicians")); 

    }

  

}