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
        @if(isset($page))
            <h4 class="mg-b-0">Edit Page</h4>
        @else
            <h4 class="mg-b-0">Add Page</h4>
        @endif
    </div>

    <div class="filemgr-content-body">
        <div class="card">
        @if(isset($page))
            <form method="POST" action="{{ route('admin.pages.update', $page->id) }}" id="add-form" data-redirect="{{route('admin.pages.index')}}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('admin.pages.store') }}" id="add-form" data-redirect="{{route('admin.pages.index')}}">
        @endif
            <div class="pd-20 pd-sm-30">
            
            <div class="flex-fill">
                
              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Page Title</label>
                  <div class="col-sm-3 col-md-3">
                    <input type="text" name="title" value="{{$page->title??''}}" class="form-control" placeholder="Page Title">
                  </div>
                  <label class="col-sm-2 col-md-2 col-form-label">Page Slug</label>
                  <div class="col-sm-3 col-md-3">
                    <input type="text" name="slug" value="{{$page->slug??''}}" class="form-control" placeholder="Page Slug">
                  </div>
              </div>

              <div class="form-group row">
                  
              </div>

              <div class="form-group row">
                  <label class="col-sm-2 col-md-2 col-form-label">Page Content</label>
                  <div class="col-sm-10 col-md-10">
                    <textarea name="content" id="editor">{!!$page->content??''!!}</textarea>
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
    <script>
    
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	
	config.extraAllowedContent = 'span;ul;li;table;td;style;*[id];*(*);*{*}';
	
	//config.enterMode = CKEDITOR.ENTER_BR;
    
    config.autoParagraph = false;
    
    config.extraAllowedContent = 'div(*)';
     config.protectedSource.push(/<i[^>]*><\/i>/g);
    config.allowedContent=true;
};
CKEDITOR.replace( 'editor');
    </script>
@endsection