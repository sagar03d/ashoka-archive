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

    <img src="images/banner.jpg" class="img-fluid">

</section>

<section class="archive-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="archive-card">
                    <a href="">
                        <img src="images/default-1.jpeg" class="img-fluid">
                        <div class="archive-overlay">
                            <h3>Manmohan Singh</h3>
                            <button type="button" class="btn btn-angle"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
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