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
    			$quantities = Input::get('qty');
				foreach($quantities as $quan)
				 {
				   
				   		$formdata[] = $quan;
				}
				echo "<pre>";
				print_r($formdata);

				// $formelements = array('name','mobile','email','name','mobile','email');
				// $finalarray = array_combine($formelements,$formdata);
				// print_r($finalarray);
				return view('multivaluestable')->with(array('formdata'=> $formdata));





    }
}
