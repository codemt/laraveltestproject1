<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\FormValidation;

class FormController extends Controller
{
    //
    public function index(){


    		return view('formsubmit');

    }
    public function store(FormValidation $request){


    		// validation is happening in requests-> validation.php
    		$name = Input::get('name');
    		$mobile = Input::get('mobile');
    		$email = Input::get('email');
    		echo $name."</br>";
    		echo $mobile."</br>";
    		echo $email."</br>";

    		// store data in array
    		//$data = array($name,$mobile,$email);

    		$data = array("name"=>$name, "mobile"=>$mobile, "email"=>$email);	
    		// check if data is stored.
    		//var_dump($data);

    		//encode data into json.
    		//$array = array_map("str_getcsv", explode("\n", $data));
    		$json = json_encode($data);
    		echo "</br>";


    		// check if data is stored in json.
    		//print_r($json);

    		 // Testing Data passing to View.
    		$myname = "Mithilesh";
    		$file = [];
    		$file['first']='Mithilesh';
    		$file['last']='Quaid';

    			// Pass single Data from Controller to View.
    		//return view('singleinvites')->with('myname',$myname);
    		//return view('singleinvites')->with('data',$data);
    		return view('singleinvites',$data);
    		// submit form and return 	


    		
    }
    public function advanceform(FormValidation $request){



    			return view('advanceform');


    }

    /*
    public function store(Request $request){
	

			$this->validate($request,[

				
					'name' => 'required|max:20',
					'mobile'=>'required|max:35',


			]);


    }

    */
}
