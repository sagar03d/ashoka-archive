<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/sagar03d/MyCDN@1.1.1/FormSubmitter.js"></script>
<script>
$("#pull").click(function(){
        $(".right-nav").css('display','block');
        $("#menu-bg").css('left','0');
        $(".bg-click").css('display','block');
    });
    $(".close-btn, .bg-click").click(function(){
        $("#menu-bg").css('left','-400px');
        $(".bg-click").css('display','none');
        $(".right-nav").css('display','none');
    });
  $(function(){

    


    $(".accordion-faq li h3").on("click", function() {

        //$(this).removeClass("active");

        $(this).next("p").slideToggle(200);

        $(this).toggleClass("active");

    });

});
</script>
