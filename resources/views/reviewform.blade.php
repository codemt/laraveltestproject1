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
                Google Reviews List
    </title>
</head>
<body>
            <h1> Google Reviews List for   </h1>

            <div class="card-block">

              <h1> Enter Place ID




                             </h1>
                         <div class="search-container">
                        <!-- <input type="text" name="search-bar" placeholder="CSV/Excel File..." class="search-input"> -->
                        <div class="col-lg-offset-4 col-lg-4">
                             <!-- <center><h1> Upload a File </h1></center> -->
                            

                             <form action="{{url('/reviewstable')}}"  method="post">
                                 {{ csrf_field() }}

                                  <input type="text" name="placeid" placeholder="Place ID of Business.." class="search-input">

                                 <input type="submit" value="getreviews">
                             </form>
                       </div>

                 </div>
                         <br>
                             <hr class="style15">
                         <br>


                   <div class="card-header">
                       <h2> Individual Invitations </h2>
                       <small class="card-subtitle"> Enter Details to Send invite </small>
                   </div>

                   <div class="card-block">
                     <div class="table-responsive">





</body>
</html>