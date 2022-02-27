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

<section class="InnerBanner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 ml-auto">
                <h1>Ashoka Archives of Contemporary India (AACI)</h1>
            </div>
        </div>
 
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="detail-left-card">
                    <div class="detail-left-card-header">
                        <h3>About Us</h3>
                    </div>
                    <div class="detail-left-card-body">
                        <div class="card-block">
                            <h4>Archives Team</h4>
                        </div>
                        <div class="card-block">
                            <h4>Collection & Access Policy</h4>
                            <ul class="list-style-angle">
                                <li><a href="">Mission Vision</a></li>
                                <li><a href="">Collection Policy</a></li>
                                <li><a href="">Mission Vision</a></li>
                                <li><a href="">Collection Policy</a></li>
                                <li><a href="">Mission Vision</a></li>
                                <li><a href="">Collection Policy</a></li>
                                <li><a href="">Mission Vision</a></li>
                                <li><a href="">Collection Policy</a></li>
                            </ul>
                        </div>
                        <div class="card-block">
                            <h4>Collections Overview</h4>
                        </div>
                        <div class="card-block">
                            <h4>Collections A-Z</h4>
                        </div>
                        <div class="card-block">
                            <h4>Catalogues</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-6">
                <div class="detail-center-card mt-4">
                    <img src="images/ashoka-campus.jpg" class="img-fluid mb-4">
                     <p>The Ashoka Archives of Contemporary India (AACI) is one of the key resource centres of Ashoka University. Established in 2017 to collect and preserve primary source material such as private and institutional papers for the study of contemporary Indian history, AACI aspires to grow into a leading centre for historical and social science research and serve as an indispensable repository of public affairs in India.</p>  
                    <p>Keeping in mind the latest trends in social science research, the main focus of Ashoka Archives is to collect documents related to economic reforms initiated in the 1990s, science and technology, environment and climate change, women empowerment, social, educational and political developments in the country, growth of media in various forms and all other related themes and make the research material available to the scholarly community at large. </p>
                    <h5>Private Papers Collection</h5>
                    <p>Ashoka Archives has witnessed an unprecedented growth in the collection of primary source material in the form of private papers from all over India. The archives team engaged with prospective donors in Delhi and undertook several outstation trips to facilitate the transfer of private papers to Ashoka Archives. In a short span of time, the archives achieved the distinction of acquiring the private papers of a former Prime Minister and President of India, eminent diplomats, journalists, authors, environmentalists/wildlife conservationists, historians, activists, artists, etc. A concerted effort was made to sort and list collections and prepare  catalogues for the ready reference of scholars. A team of trained archivists fulfilled the task of preparing scholar-friendly catalogues. (Link to collections and catalogues)</p>
                    <h5>Academic Research</h5>
                    <p>Ashoka Archives enables research and facilitates engagement with academics based on content and research, and encourages students to appreciate primary source material through innovative use in curriculum. Workshops and talks are conducted for students to give them practical knowledge of archives and acquaint them with the basic principles of archival management. (Link to academic activities)</p>
                    <p>Ashoka Archives engages and collaborates with various other archives in India and abroad for exchange of ideas and wider dissemination of historical research. Recently, the archives entered into an agreement with the Political Conflict, Gender and People’s Rights Initiative “PCRes”, Center for Race and Gender, University of California, Berkeley, and Stanford University for co-hosting the papers of Shah Commission on Ashoka Archives website and the Archive on the Legacy of Conflict in South Asia (Link to Shah Commission Papers)</p>
                    <h5>Digitisation</h5>
                    <p>A project to catalogue and digitize the archival Collections is under way and scholars can access the digitized material on the Ashoka Archives website (Please refer to Archives Access Policy). The Collections can also be consulted in the Reading Room of the Archives in Ashoka University, Sonepat.</p>   
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="detail-right-card">
                    <div class="quote">
                        <p>“Ashoka Archives aims to create one of the foremost centres for historical and social science research in the country…….………..ensure the preservation of rich cultural, social and political heritage of India for posterity…. </p>
                    </div>
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
