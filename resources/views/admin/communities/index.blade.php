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
        <div>
            <h5 class="mg-b-0">Communities</h5>
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Communities</li>
                </ol>
            </nav>

        </div>
        <div>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase" href="{{route('admin.communities.create')}}">
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($communities as $community)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $community->name }}</td>
                        <td>
                            <a href="{{route('admin.subcommunities.index', $community->id)}}" class="btn btn-secondary">Sub-Communities</a>
                            <a href="{{route('admin.collections.index', $community->id)}}" class="btn btn-secondary">Collections</a>
                            <a href="{{route('admin.communities.edit', $community->id)}}" class="btn btn-secondary">Edit</a>
                            <a href="javascript:void(0)" data-action="{{route('admin.communities.destroy', $community->id)}}" class="btn btn-danger delete" data-id="{{$community->id}}">Delete</a></td>
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
            DeleteRecord.call(this);
        });
    </script>
@endsection