<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;


class DownloadController extends Controller
{
    //
    public function index(){


    			
    				$path = storage_path('app/public/football.png');

					return response()->download($path);	

				    //png file is stored under app/public/football.png
				    // $file= storage_path()."/"."app"."/"."public"."/"."football.png";
				    // echo $file;
				    //die;
				   //  header('Content-Disposition: image/png;filename=football.png');
				    

				   // return Response::download($file, 'football.png', ['Content-Type: image/png']); 	
				  // return Response()->download($file, 'football.png');

				




    }
}
