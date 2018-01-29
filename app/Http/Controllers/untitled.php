$handler = fopen($file,'r'); // to read from file.
$csvarray = [];
if($handler!==false){
	


			// read the first row in data.
			$data = fgetcsv($handler,null,';');

			// we want all the rows so .
			while($data=fgetcsv($handler,4,';')!==false){


					// we only want the first 4 columns
					$csvarray[]=$data; // data is an array of the columns.

					// we add all the rows in $csvarray to return in the end.



		}


}
return $csvarray;