<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        return view("musicians", compact("musicians")); 

    }

    public function createAlbum(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'artist' => 'required|string|max:100',
            'year' => 'required|integer|min:1900',
            'cover' => 'required|string|max:100',
        ]);

        $album = new Album();
        $album->title = $request->input('title');
        $album->artist = $request->input('artist');
        $album->year = $request->input('year');
        $album->cover = $request->input('cover');
        $album->save();

        $successMessage = 'The album "' . $request->input('title') . '" has been successfully created.';
        Session::flash('success', $successMessage);

        // Redirect back to the same page with the success message
        return redirect()->back();
    }

}