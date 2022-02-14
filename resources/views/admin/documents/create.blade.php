@extends('admin.layouts.app')

@section('css')
    @include('admin.includes.css')
    <link href="{{ asset('admin/css/contactc.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/mainStyle.css') }}" rel="stylesheet">
    <style>
        .progress{
            display: none;
        }
    </style>
@endsection

@section('content')

@include('admin.includes.header')

<div class="filemgr-wrapper">

@include('admin.includes.leftbar')

<div class="filemgr-content">
    <div class="filemgr-content-header d-sm-flex align-items-center justify-content-between">
        @if(isset($document))
            <h4 class="mg-b-0">Edit Document</h4>
        @else
            <h4 class="mg-b-0">Add Document</h4>
        @endif
    </div>

    <div class="filemgr-content-body">
        <div class="card">
        @if(isset($document))
            <form method="POST" action="{{ route('admin.documents.update', $page->id) }}" id="add-form" data-redirect="{{route('admin.documents.index')}}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('admin.documents.store') }}" id="add-form" data-redirect="{{route('admin.documents.index')}}">
        @endif
            <div class="pd-20 pd-sm-30">
            
            <div class="flex-fill">
                <input type="hidden" name="path" id="filepath">
              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Document Name</label>
                  <div class="col-sm-3 col-md-3">
                    <input type="text" name="name" value="{{$document->name??''}}" class="form-control" placeholder="Document Name">
                  </div>
                  <label class="col-sm-1 col-md-1 col-form-label">Upload File</label>
                  <div class="col-sm-3 col-md-3">
                    <input type="file" id="file" name="file" class="form-control">
                  </div>
                  <div class="col-md-2">
                  <button type="button" class="btn btn-info btn-sm fetchcontent">Fetch Content</button>
                  </div>
              </div>
              
              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Document Metadata</label>
                  <div class="col-sm-8 col-md-8">
                    <textarea readonly name="metadata" rows="10" class="form-control">{!!$document->metadata??''!!}</textarea>
                  </div>
              </div>

              <div class="form-group row">
                  <div class="col-md-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped" id="progressbar" role="progressbar"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            
                        </div>
                    </div>  
                  </div>
              </div>
              <button type="submit" class="btn submitbtn btn-primary btn-uppercase mg-b-5 mg-sm-b-0 submitbtn">Save</button>
          
            </div>
          </div>
          
        </form>
        </div>
    </div>

</div>

</div>

@endsection

@section('js')
    @include('admin.includes.footer')
    <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>

    <script>
        $('.fetchcontent').click(function(){
            
            let formData = new FormData();
            formData.append('filename', $('#file')[0].files[0]);
         $.ajax({
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             method      : 'POST',
             data        : formData,
             url         : "{{ route('admin.document.file.upload') }}",
             processData : false, // Don't process the files
             contentType : false, // Set content type to false as jQuery will tell the server its a query string request
             dataType    : 'json',
             success     : function(response){
                 if(response.success == true)
                 {
                     $('.progress').show();
                     $('#filepath').val(response.actualpath);
                     Tesseract.recognize(
                        response.path,
                        'eng',
                        { logger: m => {
                                let progress = Math.round(m.progress*100);
                                console.log(progress);
                                if(progress > 0 && progress < 100)
                                {
                                    $('#progressbar').html(progress+'% complete');
                                    $('#progressbar').css('width',progress+'%');
                                }
                            }
                        }
                        ).then(({ data: { text } }) => {
                            $('[name="metadata"]').html(text);
                            $('.progress').hide();
                        });
                 }
                 else
                 {
                     $.notify(""+response.data+"", {type:"danger"});
                     $(".savebtn").html(btnval);
                     $(".savebtn").attr('disabled', false);
                 }
             },
             error       : function(data){
                 var errors = $.parseJSON(data.responseText);
                 $.each(errors.errors, function(index, value) {
                     $('[name="'+index+'"]').addClass('error');
                      $('[name="'+index+'"]').after('<span class="text-danger errormessage">'+value+'</span>');
                     
                 });
                 $(".savebtn").html(btnval);
                 $(".savebtn").attr('disabled', false);
             }
            });
        });
    </script>
@endsection