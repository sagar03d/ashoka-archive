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

{!! $page->content??'' !!}

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
