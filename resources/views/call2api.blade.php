<!-- PUSH FORM DATA TO YEXT API --> 

	<!DOCTYPE html>
	<html>
	<head>
		<title>
			

		</title>
	</head>
	<body>

				<?php

					$invitation_list = file_get_contents('https://api.yext.com/v2/accounts/me/reviewinvites?api_key=b324902790a0d31e738a78b7aab712d0&v=20180109');

					//$invi = json_decode($invitation_list);
					$data = $invi->response;

					$data = array("name"=>$name, "mobile"=>$mobile, "email"=>$email);

						file_putcontents('https://api.yext.com/v2/accounts/me/reviewinvites?api_key=b324902790a0d31e738a78b7aab712d0&v=20180109',$data);

						return view('leads.index');

				?>

				<?@php
												Example #1 Simple usage example

							<?php
							$file = 'people.txt';
							// Open the file to get existing content
							$current = file_get_contents($file);
							// Append a new person to the file
							$current .= "John Smith\n";
							// Write the contents back to the file
							file_put_contents($file, $current);
							?>
				@endphp
	
	</body>
	</html>