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
        <h4 class="mg-b-0">Metadata</h4>
        
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
                    @forelse($metadatas as $metadata)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $metadata->field }}</td>
                        <td>{{ $metadata->value }}</td>
                        <td>
                            <a href="javascript:void(0)" data-action="{{route('admin.metadata.destroy', $metadata->id)}}" class="btn btn-danger delete" data-id="{{$metadata->id}}">Delete</a></td>
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