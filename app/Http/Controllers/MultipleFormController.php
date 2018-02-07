<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MultipleFormController extends Controller
{
    //
    public function index(){


    			return view('multipleform');


    }
    public function submit(){


    				$formdata = array();
    			$quantities = Input::get('data');

    			//echo "<pre>";
    			print_r($quantities);

    			foreach ($quantities as $value) {

    					echo $value['name'];
    					echo "<br>";
    					echo $value['mobile'];
    					echo "<br>";
    					echo $value['email'];
    					echo "<br>";
    			}

    			//die;






				// foreach($quantities as $data)
				//  {
				//    		$i;
				//    		$formvalues = array(

				//    			'name' => $data[$i]['name'],
				//    			'mobile'=> $data[$i]['mobile'],
				//    			'email'	=> $data[$i]['email'],


				//    		);
				//    		$i++;
				// }

				// // print_r($formvalues);
				// // die;
				// echo "<pre>";
				// //print_r($formdata);

				// $formelements = array('name','mobile','email','name','mobile','email');
				// $finalarray = array_combine($formelements,$formdata);
				// print_r($finalarray);
				return view('multivaluestable')->with(array('formdata'=> $quantities));





    }
}
