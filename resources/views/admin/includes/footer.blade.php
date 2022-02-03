
<script src="{{ asset('admin/js/jquery.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>


<script src="{{ asset('admin/js/jquery-ui.js') }}"></script>

<script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/js/notify.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('admin/js/data-table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/js/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/js/data-table/buttons.colVis.min.js') }}"></script>

  
  <script>
  
  $(".numeric").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        //var x = event.keyCode;
        //alert(x);
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
  
$(document).ready(function(){
      $('.clientDataTable').DataTable({
            "pageLength": 100,
             dom: 'Bfrtip',
             buttons: [
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]
        });
    });
  

// Restricts input for the set of matched elements to the given inputFilter function.
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

/*$(function(){

$(".preloader").fadeOut("slow");

});*/

function openSearch(){
  $( '.search-content' ).slideDown(400);
}
function closeSearch(){
  $( '.search-content' ).slideUp(400);
}

</script>

  
 
<script>
    $(document).ready(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
        
    });
    </script>
  
<script>
  
$("._navtoggle > a").click(function() {
  $(".menu-dropdown").slideUp(200);
  if ($(this).parent().hasClass("show")) 
  {
    $("._navtoggle").removeClass("show");
    $(this).parent().removeClass("show");
  } else {
    $("._navtoggle").removeClass("show");
    $(this).next(".menu-dropdown").slideDown(200);
    $(this).parent().addClass("show");
  }
});



</script>

 <script>
$(function() {
  $("#select1,#select2").select2({
  	tags: "true",
    placeholder: "Select an option",
    allowClear: true
  });
});
</script>
<script>
function menuopen()
{
    $(".filemgr-sidebar").addClass("menuadd");
}
function menuclose()
{
    $(".filemgr-sidebar").removeClass("menuadd");
}
</script>





