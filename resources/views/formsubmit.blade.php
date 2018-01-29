<!DOCTYPE html>
<html>
<head>
  <title> Form Submit </title>
                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>

        <h1>  Form Submission </h1>
        

                  @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)

                              <p class="alert alert-danger">{{ $error }}</p>

                        @endforeach 

                  @endif

                  <div class="container">
                        
                       <form action="storeformvalues" method="post">
                              {{ csrf_field() }}
                             <div class="row">
                               <div class="col">
                                 <input type="text" name="name"class="form-control" placeholder="First name">
                               </div>
                               <div class="col">
                                 <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                               </div>
                               <div class="col">
                                 <input type="text" name="email" class="form-control" placeholder="Email(Optional)">
                               </div>
                             </div>
                          
                                     

                           <br> <br>
                           <div class="input-group mb-3">
                             <div class="input-group-prepend">
                               <button class="btn btn-default" id="add" type="button">Add</button>
                             </div>
                             <input type="text" />
                             <br>Lead Placeholders
                           </div>


                            <input type="submit" value="upload">
                       </form>
                      
                      

                  
                 
                  <script>
                                        $('#add').click(function () {
                        var div = $(this).closest('div');
                        if (div.find('input:text').length < 7) {
                            div.append('<tr><td style="width:200px;" align="right"> <td> <input type="text" class="form-control" placeholder="First name"> <input type="text" class="form-control" placeholder="Mobile"> <input type="text" class="form-control" placeholder="Email(Optional)"> </td></tr>');
                        }
                    });
                </script>

</body>
</html>
