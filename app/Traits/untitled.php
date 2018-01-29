<?php

namespace App\Traits;

trait google
{


		public $place_id;
		public $api_key;
		public $base_url;


		public function __construct()
		{

                

				// place id is for HNR , api_key is for mithilesh@ves.ac.in account
			// place id testing 1 = "ChIJ4-lzBZjH5zsRLPnqEHXuEVU";
			//place id testing 2 = "ChIJHXhlzNLI5zsRiqO1VxW0eYE"
				$this->place_id='ChIJHXhlzNLI5zsRiqO1VxW0eYE';
				$this->api_key='AIzaSyBz9zhUopwBQu1MqBUGwMqYzYR2sJ1Xc7Q';

				  $this->base_url='https://maps.googleapis.com/maps/api/place/details/json?placeid=';


		}

		function googleRequest($url,$type=false, $member_data=false) {
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($member_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $head = curl_exec($ch);

        // echo "<pre>";

         $jsonarray = json_decode($head,true);
         // print_r($jsonarray);
         // die;
         // $reviewarray = $jsonarray['result']['reviews'] ;

         // for($x = 0; $x <= 3; $x++)
         // {
         // 	




         // }
         

         
         // print_r($insert);
         // die;
        
         // $data1 =  $jsonarray['result']['reviews'] [0]['author_name'];
         // $data2 =  $jsonarray['result']['reviews'] [0]['rating'];
         // $data3 =  $jsonarray['result']['reviews'] [0]['text'];
         // echo $data1."</br>";
         // echo $data2."</br>";
         // echo $data3,"</br>";
         // echo "<tr>";                			

         $review = array();
         $author_names = array();
         $rating = array();		
         
         for($x = 0; $x <= 3; $x++) {

         		
         			


	   $author_names[$x] = $jsonarray['result']['reviews'] [$x]['author_name'];
	         $rating[$x] = $jsonarray['result']['reviews'] [$x]['rating'];	
	         $review[$x] = $jsonarray['result']['reviews'] [$x]['text'];

	         	}	
         	
         // print_r($author_names);
         // print_r($rating);
         // print_r($review);
         $semifinal_array = array_combine($author_names,$review);
         //var_dump($semifinal_array);
         //print_r($semifinal_array);
         $finalarray = array_combine($rating,$semifinal_array);
         //print_r($finalarray);

        
         
    	//die;


        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
       
        if($http_code == 200)
        {
            return $head;

        }
        else{
            return false;
        }
        //return $semifinal_array;
        //return view('googlereviews');
    }
    public function singleinvites()
    {
         // $datafile = $data;

            $userplaceID = $_POST['placeid'];
            
           //      print_r($userplaceID);
                 die;
          $full_url = url()->full();
          $query_params = substr($full_url, strpos($full_url, "?") + 1);
          
            $url = $this->base_url;

            // print_r($url);
            // die;

          if(strpos($full_url, "?"))
          {
              $url = $this->base_url;
          }
          else{
              $url = $this->base_url;
          }

          $result = $this->googleRequest($url,'POST');

        //$result2 = json_decode($result,true);
         // print_r($result);
          return $result;
          

    }





}
