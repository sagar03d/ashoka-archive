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
        @if(isset($subcollection))
            <h4 class="mg-b-0">Edit Sub-Collection ({{$collection->name}})</h4>
        @else
            <h4 class="mg-b-0">Add Sub-Collection ({{$collection->name}})</h4>
        @endif
    </div>

    <div class="filemgr-content-body">
        <div class="card">
        @if(isset($subcollection))
            <form method="POST" action="{{ route('admin.subcollections.update', [$community->id, $collection->id, $subcollection->id]) }}" id="add-form" data-redirect="{{route('admin.subcollections.index', [$community->id, $collection->id])}}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('admin.subcollections.store', [$community->id, $collection->id]) }}" id="add-form" data-redirect="{{route('admin.subcollections.index', [$community->id, $collection->id])}}">
        @endif
            <div class="pd-20 pd-sm-30">
            
            <div class="flex-fill">
                
              <div class="form-group row">
                  <label class="col-sm-4 col-md-3 col-form-label">Name</label>
                  <div class="col-sm-4 col-md-4">
                    <input type="text" name="name" value="{{$subcollection->name??''}}" class="form-control" placeholder="Name">
                  </div>
              </div>
              
              <button type="submit" class="btn btn-primary btn-uppercase mg-b-5 mg-sm-b-0 submitbtn">Save</button>
          
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
    
@endsection