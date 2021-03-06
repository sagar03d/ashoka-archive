<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>index</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content=""/>
    <link rel="canonical" href="index.html"/>
    @include('includes.css')

</head>

<body>

@include('includes.header')


<section class="banner">
    @foreach ($sliders as $slider)
        <img src="{{ asset($slider->path) }}" class="img-fluid">
    @endforeach
</section>

<section class="archive-section">
    <div class="container">
        <div class="row">
            @foreach ($collections as $collection)
            
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="{{ asset($collection->image??'default-img.jpg') }}" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>{{$collection->name??''}}</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</section>

@include('includes.footer')
@include('includes.js')


<script>

$('#slide1, #slide2, #slide3').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
    autoplay:false,
    autoplayTimeout:2000,
    autoplaySpeed: 2300,
    responsiveClass:true,
    dots: false,
    responsive:{
        0:{
            items: 1,
            margin: 15,
            nav:false,
            autoplay: false,
            stagePadding: 55
        },
        576:{
            items:2
        },
        992:{
            items:4
        }
    }

});
</script>
</body>
</html>