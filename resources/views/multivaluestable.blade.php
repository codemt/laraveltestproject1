<!DOCTYPE html>
<html>
<head>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>
                Single Invite List 
    </title>
</head>
<body>
            <h1> Submit Multiple Form Values    </h1>

            <div class="table-responsive">
               <table id="data-table" class="table table-bordered">
                        <thead class="thead-default">
                        <tr>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">First Name
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Mobile #
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Email
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                                
                                @foreach($formdata as $value) 
                                <tr> 

                                       <td> {{ $value['name'] }} </td>
                                       <td> {{ $value['mobile'] }} </td> 
                                       <td> {{ $value['email'] }} </td>  
                                </tr>    

                                @endforeach
                                <tr>
                                    
                                </tr>
                                <tr>
                                    
                                </tr>
                                
                                    
                            {{--@endforeach--}}
                        {{--<tr>
                            <td>test</td>
                            <td>9876543210</td>
                            <td>test@test.com</td>
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="text-center"><input type="checkbox"></td>
                            <td>1-Jan-2018</td>

                        </tr>--}}
                        </tbody>
                    </table>     

                    
                </div>





</body>
</html>