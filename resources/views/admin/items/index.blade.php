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
        <h5 class="mg-b-0">Items</h5>
        <div>
            <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase" href="{{route('admin.items.create', $collection->id)}}">
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
                    @forelse($items as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if($item->metadatas->count())
                            <a href="{{route('admin.view.metadata', [$item->id])}}" class="btn btn-secondary">Metadata</a>
                            @endif
                            <a href="{{route('admin.files.index', [$item->id])}}" class="btn btn-secondary">Files</a>
                            <a href="{{route('admin.items.edit', [$item->collection_id, $item->id])}}" class="btn btn-secondary">Edit</a>
                            <a href="javascript:void(0)" data-action="{{route('admin.items.destroy', [$item->collection_id, $item->id])}}" class="btn btn-danger delete" data-id="{{$item->id}}">Delete</a>
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
            DeleteRecord.call(this);
        });
    </script>
@endsection