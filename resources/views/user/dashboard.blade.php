<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>index</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content=""/>
    <link rel="canonical" href="index.html"/>
    @include('includes.css');

</head>

<body>

@include('includes.header');

<section class="InnerBanner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 ml-auto">
                <h1>My Account</h1>
            </div>
        </div>
 
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="detail-left-card">
                    <div class="detail-left-card-header">
                        <h3>User Name</h3>
                    </div>
                    <div class="detail-left-card-body">
                        <div class="card-block">
                            <h4>Personal Info</h4>
                        </div>
                        <div class="card-block">
                            <h4>Payment & Subscriptions</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="detail-center-card mt-4">
                    <div class="text-center mb-4">
                        <div class="avatar avatar-sm user-avatar mb-3">
                            <span class="avatar-initial rounded-circle">S</span>
                        </div>
                        <h4>Welcome, {{Auth::user()->name??''}}
                    </div>
                    <div class="bg-white shadow-sm rounded p-4 mb-4">
                        <div class="user-sec-title flex-title mb-3">
                            <h2>Personal Info</h2>
                            <a href="#" data-target="#edit-personal-details" data-toggle="modal" class="btx-link"><i class="uil uil-edit-alt"></i>Edit</a>
                        </div>
                        <hr class="mx-n4 mb-4">
                        <div class="form-row align-items-center">
                          <p class="col-sm-3 text-muted mb-0 mb-sm-3">Name:</p>
                          <p class="col-sm-9 text-3">{{Auth::user()->name??''}} </p>
                        </div>
                        <div class="form-row align-items-center">
                          <p class="col-sm-3 text-muted mb-0 mb-sm-3">Mobile:</p>
                          <p class="col-sm-9 text-3">{{Auth::user()->mobile_number??''}}</p>
                        </div>
                        <div class="form-row align-items-center">
                          <p class="col-sm-3 text-muted mb-0 mb-sm-3">Email:</p>
                          <p class="col-sm-9 text-3">{{Auth::user()->email??''}}</p>
                        </div>
                        <div class="form-row align-items-baseline">
                          <p class="col-sm-3 text-muted mb-0 mb-sm-3">Joined:</p>
                          <p class="col-sm-9 text-3">{{ date('d M ,Y', strtotime(Auth::user()->created_at)) }}</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

<div id="edit-personal-details" class="modal fade" aria-hidden="true" data-backdrop="static" data-keyboard="false"> 
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          
        <form id="personaldetails" method="POST" action="{{route('user.change.info', auth()->user()->id)}}" data-redirect="">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title font-weight-400">Personal Details</h5>
              <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body p-4">
              
                <div class="row mb-4">
                    
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                          <div class="upload-profile-image">
                              <div class="update-photo">
                                <img class="image" src="http://kissantrac.com/beta/public/images/user.svg" alt="">
                                <div class="file-upload">
                                    <input type="file" name="profile_image" class="file-input">
                                 </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    
                  <div class="col-md-8 col-12">
                    
                    <div class="form-group">
                      <label>Full Name</label>
                      <div class="row row-xs">
                            <div class="col-md-8 col-8">
                              <input type="text" value="{{Auth::user()->name??''}}" name="name" class="form-control" placeholder="Full Name">
                            </div>
                      </div>
                    </div>
                  
                    <div class="form-group mb-2">
                      <label>Mobile</label>
                      <input type="number" value="{{Auth::user()->mobile_number??''}}" name="mobile_number" class="form-control" placeholder="Mobile">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" value="{{Auth::user()->email??''}}" name="email" class="form-control" placeholder="Email ID">
                    </div>
                  </div>
                
                </div>
                
                
            </div>
            
            <div class="modal-footer">
                <button class="btx btx-transparent bg-light text-muted" type="button" data-dismiss="modal" aria-label="Close">Discard</button>
                <button class="btx btx-green" type="submit">Save Changes</button>
            </div>
        
        </form>
        
      </div>
    </div>
</div>

@include('includes.footer');
@include('includes.js');

<script>
    $('.file-input').on('change', function(){
        var curElement = $(this).parent().parent().find('.image');
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            curElement.attr('src', e.target.result);
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>

</body>
</html>
