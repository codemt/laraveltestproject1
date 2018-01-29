<!DOCTYPE html>
<html>
<head>
                    <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>
        
    </title>
</head>
<body>
    <div class="container">
        <table border="0" cellspacing="2">

           <tr>
                    <td style= "width:200px;" align="right">Name
                     <td>
                     <!--<input type="text" id="current Name" value="" /> -->
                     <input type="text" class="form-control" placeholder="First name">
                    </td></td>
           </tr>                           
            <tr>
                        
                    <td align="right">Mobile</td>
                    <td>

                        <input type="text" class="form-control" placeholder="Mobile">
                        <!--<select id="test" style= "width:350px;"> -->                         
                        <!--</select> -->
                    </td>
            </tr>
            <tr>
                        
                    <td align="right"> Email </td>
                    <td>

                        <input type="text" class="form-control" placeholder="Email(Optional)">
                        <!--<select id="test" style= "width:350px;"> -->                         
                        <!--</select> -->
                    </td>
            </tr>
                        <!--<select id="test" style= "width:350px;"> -->                         
                        </select>
                    </td>
            </tr>
                    

            <tr>
                        
                    <td align="right"> </td>
                        
                    <td>
                        <input type="button" id="add" value="Add" onclick="AddTables();"/>                       

                        </td>
            </tr>

                    <tr>
                        <td style="height:3px" colspan="2"></td>
                    </tr>
                    <tr style="background-color: #383838">
                        <td></td>
                                            </tr>
                    <tr>

                    </tr>
                    <tr>

                        </div>
                        </div>
                        </td>
                    </tr>
                </table>
                <script>
                                            $('#add').click(function () {
                        var table = $(this).closest('table');
                        if (table.find('input:text').length < 7) {
                            table.append('<tr><td style="width:200px;" align="right"> <td> <input type="text" class="form-control" placeholder="First name"> <input type="text" class="form-control" placeholder="Mobile"> <input type="text" class="form-control" placeholder="Email(Optional)"> </td></tr>');
                        }
                    });

                                        



                </script>
    </div>
    

</body>
</html>