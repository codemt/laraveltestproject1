<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrumController extends Controller
{
    //
    public function index()
    {

    		$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;

			$breadcrumbs->addCrumb('Home', '/');

			echo $breadcrumbs->render();

    }
    
}
