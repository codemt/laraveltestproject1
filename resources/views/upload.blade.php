@extends('layouts.app')

@section('content')

    

    <div class="container">
            <div class="col-lg-offset-4 col-lg-4">
                <center><h1> Upload a File </h1></center>
                <form action="store" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                   
                    <input type="file" name="image">
                    <br>
                    <input type="submit" value="upload">
                </form>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="{{ URL::asset('js/Basic-fancyBox-Gallery.js') }}"></script>
@endsection

<!-- </html> --> 