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
        <h4 class="mg-b-0">Media</h4>
        <div>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase" data-toggle="modal" data-target="#addModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add
            </button>
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
                    <th>Path</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($images as $image)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="pw" src="{{ asset($image->path) }}"></td>
                        <td>{{asset($image->path)}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-white btn-delete delete" data-action="{{ route('admin.media.destroy', $image->id) }}"><i class="uil uil-trash-alt"></i>Delete</button>
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
<div class="modal fade effect-scale" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form method="POST" action="{{ route('admin.media.store') }}" id="add-form">
          <div class="modal-body pd-20 pd-sm-30">
            <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <h5 class="tx-18 tx-sm-20 mg-b-20">New File</h5>
           
            <div class="d-sm-flex">
             
              <div class="flex-fill">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">File</label>
                    <div class="col-sm-8">
                      <input type="file" name="file">
                    </div>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
              <button type="submit" class="btn btn-primary btn-uppercase mg-b-5 mg-sm-b-0 submitbtn">
              Save
              </button>
              <button type="button" class="btn btn-light btn-uppercase mg-sm-l-5" data-dismiss="modal">Discard</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>

@endsection

@section('js')
    @include('admin.includes.footer')
<script>

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
       var action = "{{ url('admin/purpose/') }}/"+category.id;
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