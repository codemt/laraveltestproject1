@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row flex-box flex-wrap-wrap">
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center">
                <a href="{{ URL::asset('img/hero-background-nature.jpg') }}" class="fancybox" rel="gallery1" title="Hero Image Nature"><img class="img-responsive" src="{{ URL::asset('img/hero-background-nature.jpg') }}"></a>
            </div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center">
                <a href="{{ URL::asset('img/hero-background-technology.jpg') }}" class="fancybox" rel="gallery1" title="Hero Image Technology"><img class="img-responsive" src="{{ URL::asset('img/hero-background-technology.jpg') }}"></a>
            </div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center">
                <a href="assets/img/hero-background-travel.jpg" class="fancybox" rel="gallery1" title="Hero Image Travel"><img class="img-responsive" src="{{ URL::asset('img/hero-background-travel.jpg') }}"></a>
            </div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center">
                <a href="{{ URL::asset('img/hero-background-food.jpg') }}" class="fancybox" rel="gallery1" title="Hero Image Food"><img class="img-responsive" src="{{ URL::asset('img/hero-background-food.jpg') }}"></a>
            </div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center">
                <a href="{{ URL::asset('img/hero-background-music.jpg') }}" class="fancybox" rel="gallery1" title="Hero Image Music"><img class="img-responsive" src="{{ URL::asset('img/hero-background-music.jpg') }}"></a>
            </div>
            <div class="col-sm-4 flex-box flex-justify-center flex-align-center">
                <a href="{{ URL::asset('img/hero-background-photography.jpg') }}" class="fancybox" rel="gallery1" title="Hero Image Photography"><img class="img-responsive" src="{{ URL::asset('img/hero-background-photography.jpg') }}xx"></a>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script src="{{ URL::asset('js/Basic-fancyBox-Gallery.js') }}"></script>
@endsection

<!-- </html> --> 