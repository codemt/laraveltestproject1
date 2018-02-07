@extends('layouts.app')
@section('title','formsubmit')
@section('content')

    <div class="container">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('upload') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
              </ol>
            </nav>
        
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
        </div>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="{{ URL::asset('js/Basic-fancyBox-Gallery.js') }}"></script>
@endsection

<!-- </html> --> 