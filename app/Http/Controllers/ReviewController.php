<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\google;
use Illuminate\Support\Facades\Input;


class ReviewController extends Controller
{
    //
    use google;
    public function index(Request $request){



            $userplaceId = Input::get('placeid');
            //var_dump($userplaceId);
            //die;    		
    		//echo "Hello";
               // $this->__construct($userplaceId);
 		$getreviews = $this->singleinvites($userplaceId);
         $reviewdata = json_decode($getreviews,true);
           
        $keySearch = 'reviews';
        

        $insert = array();
        //echo "<pre>";
       // $getkey = array_key_exists('review',$reviewdata);
       //  print_r($getkey);
      //  die;

       
                //echo "No reviews";
        /*function findKey($reviewdata, $keySearch)
        {
            foreach ($reviewdata as $key => $item) 
            {
                if ($key == $keySearch)
                 {
                    echo 'yes, it exists';
                    return true;

                } 
                elseif (is_array($item) && findKey($item, $keySearch)) 
                {
                    return true;
                }

            }
             return false;
         }*/
                    
                if(isset($reviewdata['result']['reviews']))
                {


                    echo " reviews exist";

                        foreach ( $reviewdata['result']['reviews'] as $key => $value)
                      {

                         
                         $insert[] = array
                         (
                             'author_name' => $value['author_name'],
                             'rating' => $value['rating'],
                             'text'  => $value['text']
                         );


                     }

                }
                else
                {
                    $noreviews =  "<h4>review does not exist</h4>" ;
                    echo $noreviews;
                }

        


        
        // else
        //   {

        //     echo "No Reviews Found";
        //   }  
        
         

         //print_r($insert);
        //die;
   
         //var_dump($semifinal_array);
          return view('reviewstable')->with(array('semifinal_array'=>$insert));




}
public function mergeArrays($author_names, $rating, $review) 
{
        $result = array();
        foreach ( $author_names as $key=>$name )
         {
            $result[] = array( 'author_name' => $name, 'rating' => $rating[$key], 'review' => $review[ $key ] );
        }

        return $result;
}
public function show(){


        return view('googlereviews');

}
public function getplaceId()
{


        return view('reviewform');

}

}
