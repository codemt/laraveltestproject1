<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;


class CSVController extends Controller
{
    //
	public function index()
	{

			return view('csvupload');

	}

	public function store(Request $request)
	{

				if($request->hasFile('image'))
				{

							
							//return request->file('image');
							//return $request->image->store('public');
							$path = $request->file('image')->storeAs
							(
    							'public', 'example'
							);
							//return $path;

							//Storage::putFile('public',request->file('image'));
							
			                $file = $request->file('image');
			                //Storage::disk('local')->put($file, 'example.csv');
			                //Storage::disk('local')->put(' test2.csv', $file);
			               // Input::file('image')->move('public', 'test.csv');
            		
			                
			                $csvData = file_get_contents($file);
			                //print_r($csvData);

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
			              // print_r($json);
			               // submitInvites($json);

			                ini_set('auto_detect_line_endings', '1');
                
                
                			$lines = explode("\n", $csvData);

                			$header = array_shift($lines);
                			$header = explode(',', $header);

                			$csv = array();

                echo '<pre>';
        

			                foreach ($lines as $key => $value) 
			                {
			                           
			                   $csv[] = array_combine($header, explode(',', $value));
			                    
			                }

                		print_r($csv);
                		
                
                		return view('csvtable')->with(array('csvdata'=>$csv));

						
				}
    			else
    			{
    				
                //$file2 = Storage::get('public/test.csv');
                
                	echo " No file selected ";

                
//die;          

		
				


			}



	}
}
