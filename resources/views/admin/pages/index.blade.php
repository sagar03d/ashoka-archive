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
        <h4 class="mg-b-0">Pages</h4>
        <div>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase" href="{{route('admin.pages.create')}}">
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
                    <th>Slug</th>
                    <th>Show</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td><a href="{{ url($page->slug) }}" target="_blank">View Page</a></td>
                        <td>
                            <a href="{{route('admin.pages.edit', $page->id)}}" class="btn btn-sm btn-white btn-edit edit"><i class="uil uil-edit-alt"></i>Edit</a>
                            <button type="button" class="btn btn-sm btn-white btn-delete delete" data-action="{{ route('admin.pages.destroy', $page->id) }}"><i class="uil uil-trash-alt"></i>Delete</button>
                        </td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Page Found</td>
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
    $(document).on('click', '.delete', function(){
        DeleteRecord.call(this);          
    });
</script>
@endsection