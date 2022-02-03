@extends('admin.layouts.app')

@section('css')
    @include('admin.includes.css')
    <link href="{{ asset('admin/css/contactc.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/mainStyle.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('admin.includes.header')

<div class="filemgr-wrapper">

@include('admin.includes.leftbar')

<div class="filemgr-content">
    <div class="filemgr-content-header d-sm-flex align-items-center justify-content-between">
        <h4 class="mg-b-0">{{$menu->name}} Sub-Menus</h4>
        <div>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase" href="{{route('admin.submenus.create', $menu->id)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add
            </a>
        </div>
    </div>

    <div class="filemgr-content-body">
        <div class="card-dashboard-table">
            <div class="table-responsive">
              <table class="table table-hover clientDataTable">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($submenus as $submenu)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $submenu->name }}</td>
                        <td>{{ $submenu->url }}</td>
                        <td>
                            <a href="{{route('admin.submenus.index', $submenu->id)}}" class="btn btn-secondary">Sub-Menus</a>
                            <a href="{{route('admin.submenus.edit', [$menu->id, $submenu->id])}}" class="btn btn-secondary">Edit</a>
                            <a href="javascript:void(0)" data-action="{{route('admin.submenus.destroy', [$menu->id, $submenu->id])}}" class="btn btn-danger delete" data-id="{{$submenu->id}}">Delete</a>
                        </td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
        </div>
    </div>

</div>

</div>

@endsection

@section('js')
    @include('admin.includes.footer')
<script>
$('.delete').click(function(){
    this.DeleteRecord(this);
});
  function addCustomer()
  {
    $('._AddCustomer').addClass('show');
    $('._AddCustomer_Close').show();
  }
  function closeCustomer()
  {
    $('._AddCustomer').removeClass('show');
    $('._AddCustomer_Close').fadeOut();
  }
  
    $('.select2').select2({
      dropdownParent: $('#addModal'),
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search options'
    });
    
    $('.edit_status').select2({
      dropdownParent: $('#editModal'),
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search options'
    });
    
    $('.select3').select2({
      dropdownParent: $('#editModal'),
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search options'
    });
    
    $('.selectarea').select2({
      placeholder: 'Choose Area',
      searchInputPlaceholder: 'Search options'
    });
   
</script>

<script>
  
   $('.edit').click(function(){
       var category = $(this).data('obj');
       var action = "{{ url('admin/categories/') }}/"+category.id;
       $('.edit_name').val(category.name);
       $('.edit_status').val(category.status).trigger('change');
       $('#editModal').modal('show');
       $('#edit-form').attr('action', action);
   });
   
    $( function() {
       $( ".start-date" ).datepicker({
          dateFormat: "dd-mm-yy"
        });
        $( ".end-date" ).datepicker({
          dateFormat: "dd-mm-yy"
        });
    });
    
    $("form#add-form").on('submit', function(){
        $('.submitbtn').html('<div class="spinner-border text-light" role="status">'+
                                  '<span class="sr-only">Loading...</span>'+
                                '</div>');
        var formData = new FormData(this);
             $.ajax({
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method      : 'POST',
                    data        : formData,
                    url         : $(this).attr('action'),
                    processData : false, // Don't process the files
                    contentType : false, // Set content type to false as jQuery will tell the server its a query string request
                    dataType    : 'json',
                    success     : function(response){
                        $('.submitbtn').html('Save');
                        if(response.success == true)
                        {
                            Swal.fire({   
                                    title: "Success",   
                                    text: response.message,   
                                    icon: "success",   
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 2000
                            });
                            window.location.reload();
                        }
                        else
                        {
                            $.notify(""+response.data+"", {type:"danger"});
                            $("#submit_button").attr('disabled', false);
                        }
                    },
                    error       : function(data){
                        $('.submitbtn').html('Save');
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(index, value) {
                            $.notify(""+value+"", {type:"danger"});
                            $("#"+index+"_error").text(value);
                        });
                        $("#submit_button").attr('disabled', false);
                    }

                });
                return false;
            });
    
    $("form#edit-form").on('submit', function(){
        $('.submitbtn').html('<div class="spinner-border text-light" role="status">'+
                                  '<span class="sr-only">Loading...</span>'+
                                '</div>');
        var formData = new FormData(this);
             $.ajax({
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method      : 'post',
                    data        : formData,
                    url         : $(this).attr('action'),
                    processData : false, // Don't process the files
                    contentType : false, // Set content type to false as jQuery will tell the server its a query string request
                    dataType    : 'json',
                    success     : function(response){
                        $('.submitbtn').html('Update');
                        if(response.success == true)
                        {
                            Swal.fire({   
                                    title: "Success",   
                                    text: response.message,   
                                    icon: "success",   
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    timer: 2000
                            });
                            window.location.reload();
                        }
                        else
                        {
                            $.notify(""+response.data+"", {type:"danger"});
                            $("#submit_button").attr('disabled', false);
                        }
                    },
                    error       : function(data){
                        $('.submitbtn').html('Update');
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(index, value) {
                            $.notify(""+value+"", {type:"danger"});
                            $("#"+index+"_error").text(value);
                        });
                        $("#submit_button").attr('disabled', false);
                    }

                });
                return false;
            });
   
    $(document).on('click', '.delete', function(){
                var action = $(this).data('action');
                Swal.fire({   
                    title: "Do you really want to delete ?",   
                    text: "",   
                    icon: "warning",   
                    showCancelButton: true,
                    showConfirmButton: true, 
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, Delete it!",
                    confirmButtonColor: "#FF0000"
                });
                $(".swal2-confirm").unbind().on('click', function(){
                    $.ajax({
                        headers   :{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        method      : 'delete',
                        url         : action,
                        //processData : false, // Don't process the files
                        //contentType : false, // Set content type to false as jQuery will tell the server its a query string request
                        dataType    : 'json',
                        success     : function(response){
                            if(response.success == true)
                            {
                                Swal.fire({   
                                        title: "Success",   
                                        text: response.message,   
                                        icon: "success",   
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        timer: 1000
                                });
                                window.location.href="";
                                
                            }
                            else
                            {
                                $.notify(""+response.data+"", {type:"danger"});
                            }
                        },
                        error       : function(data){
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function(index, value) {
                                $.notify(""+value+"", {type:"danger"});
                            });
                        }

                    });
                });
            });

</script>
@endsection