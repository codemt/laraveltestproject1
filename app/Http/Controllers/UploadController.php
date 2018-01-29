<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    //
    public function index(){

    		return view('upload');
            


    }
    public function store(Request $request)
    {

    		 if($request->hasFile('image')){

                $file = $request->file('image');
                $csvData = file_get_contents($file);

                //$rows = array_map('str_getcsv', file('myfile.csv'));
                $rows = array_map("str_getcsv", explode("\n", $csvData));
                $header = array_shift($rows);
                $csv = array();
                foreach ($rows as $row)
                 {
                  $csv[] = array_combine($header, $row);

                }
                //print_r($csv);
                $json = json_encode($csv);
                echo "</br>";
                print_r($json);
/*
    			 $request->image->store('public','test.csv');
                  $file2 = Storage::get('public/test.csv');

                  ini_set('auto_detect_line_endings', '1');
                  // convert file into array
                  $lines = explode("\n", $file2);

                  // shirt the header and the data.
                  $header = array_shift($lines);
                $header = explode(',', $header);

                $csv = array();

                foreach ($lines as $key => $value) 
                {
                           
                   $csv[] = array_combine($header, explode(',', $value));
                    
                }

                return view('csvtable',$csv);*/


    		}
    		else
    		{
    				
                $file2 = Storage::get('public/test.csv');
                

                ini_set('auto_detect_line_endings', '1');
                
                
                $lines = explode("\n", $file2);

                $header = array_shift($lines);
                $header = explode(',', $header);

                $csv = array();

                //echo '<pre>';
        

                foreach ($lines as $key => $value) 
                {
                           
                   $csv[] = array_combine($header, explode(',', $value));
                    
                }

                print_r($csv);

                return view('csvtable')->with(array('csvdata'=>$csv));
//die;          


    		}


    } 
}
