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
            <h1> Single Invite List for  </h1>

            <div class="table-responsive">
               <table id="data-table" class="table table-bordered">
                        <thead class="thead-default">
                        <tr>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> Location ID  
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> firstName
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> lastName
                            </th>
                             <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> contact
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> Image
                            </th>
                             <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> TemplateId
                            </th>
                             <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending"> Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            {{--@foreach($invitations as $invitation_list => $value)--}}
                                    
                                 
                                @foreach( $csvdata as $key => $value)
                                <tr>
                                    <td>  {{ $value['locationId'] }} </td> 
                                    <td>  {{ $value['firstName'] }}</td>
                                    <td>  {{ $value['lastName'] }}</td> 
                                    <td>{{ $value['image'] }} </td> 
                                    <td>{{ $value['templateId'] }} </td> 
                                    <td>     </td> 
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