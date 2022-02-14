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
        <h4 class="mg-b-0">Documents</h4>
        <div>
            <a href="javascript:void(0)" class="btn btn-sm pd-x-15 btn-primary btn-uppercase generatemetadata">
                Generate Metadata
            </a>  
          <a href="{{ route('admin.documents.create') }}" class="btn btn-sm pd-x-15 btn-primary btn-uppercase">
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
                    <th>Path</th>
                    <th>Metadata</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($documents as $document)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$document->name}}</td>
                        <td><a href="{{asset($document->path)}}" class="btn btn-info btn-sm" target="_blank">Show</a></td>
                        <td>@if(isset($document->metadata)) Generated @else Not Generated @endif</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-white btn-delete delete" data-action="{{ route('admin.documents.destroy', $document->id) }}"><i class="uil uil-trash-alt"></i>Delete</button>
                        </td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Data Found</td>
                        </tr>
                    @endforelse
                    {{$documents->links()}}
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
    <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>
<script>
    $('.generatemetadata').click(function(){
      let paths = @json($nonmetadatadocs);
      
      if(paths.length > 0)
      {
        
        let timerInterval
          Swal.fire({
            title: 'Please Wait...',
            html: '<b></b>% complete <br> We are generating your metadatas in the background. DO NOT REFRESH',
            allowEscapeKey: false,
            allowOutsideClick: false,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
              let count = paths.length;
              paths.forEach(function(val, index){
                Tesseract.recognize(
                    val.path,
                    'eng',
                    { logger: m => {
                            // console.log(m);
                            const b = Swal.getHtmlContainer().querySelector('b');
                            b.textContent = Math.round((m.progress*100));
                        }
                    }
                    ).then(({ data: { text } }) => {
                      count--;
                      $.post("{{route('admin.metadata.update')}}", {
                          '_token': "{{csrf_token()}}",
                          'document_id' : val.id,
                          'metadata' : text
                        },
                        function(data, status){
                          if(count == 0)
                          {
                            Swal.close();
                            window.location.reload();
                          }
                        });
                    });
              });
              
            },
            willClose: () => {
              clearInterval(timerInterval)
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
              console.log('I was closed by the timer')
            }
          });
        
      }
      else
      {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'No data found to generate metadata',
          footer: 'It seems you have already generated metadatas for all files.'
        })
      }

    });  
</script>
@endsection