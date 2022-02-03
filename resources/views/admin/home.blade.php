@extends('admin.layouts.app')

@section('css')
    @include('admin.includes.css')
    <link href="{{ asset('admin/css/mainStyle.css') }}" rel="stylesheet">
   
@endsection

@section('content')
 @include('admin.includes.header')

<div class="filemgr-wrapper">

@include('admin.includes.leftbar')

<div class="filemgr-content ps-active-y">
    <div class="pd-20 pd-lg-25 pd-xl-30">
        <h4 class="mg-b-15 mg-lg-b-25">Dashboard</h4>
        <div class="row row-xs">
            <div class="col-sm-6 col-lg-3">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total User</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$usercount}}</h3>
                <!--<p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-up"></i></span> than last week</p>-->
                </div>
            </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
            <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Pages</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{$pagecount}}</h3>
                </div>
            </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
            <!-- <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Categories</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">12</h3>
                </div>
            </div> -->
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
            <!-- <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Videos</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1,650</h3>
                </div>
            </div> -->
            </div><!-- col -->
        </div>

        {{--<div class="row row-xs">
            <div class="col-md-4 col-xl-4 mg-t-30">
                <div class="card ht-100p">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mg-b-0">Transaction History</h6>
                  </div>
                  <ul class="list-group list-group-flush tx-13">
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="fa fa-check"></i></span></div>
                      <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-0">Payment from #10322</p>
                        <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 3:30pm</small>
                      </div>
                      <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-0">+ $250.00</p>
                        <small class="tx-12 tx-success mg-b-0">Completed</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-indigo op-5"><i class="fa fa-recycle"></i></span></div>
                      <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-2">Process refund to #00910</p>
                        <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 1:00pm</small>
                      </div>
                      <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-2">-$16.50</p>
                        <small class="tx-12 tx-success mg-b-0">Completed</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-orange op-5"><i class="fa fa-car"></i></span></div>
                      <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-2">Process delivery to #44333</p>
                        <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 11:40am</small>
                      </div>
                      <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-2">3 Items</p>
                        <small class="tx-12 tx-info mg-b-0">For pickup</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="fa fa-credit-card"></i></span></div>
                      <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-0">Payment from #023328</p>
                        <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 10:30pm</small>
                      </div>
                      <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-0">+ $129.50</p>
                        <small class="tx-12 tx-success mg-b-0">Completed</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-gray-400"><i class="fa fa-credit-card"></i></span></div>
                      <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-0">Payment failed from #087651</p>
                        <small class="tx-12 tx-color-03 mg-b-0">Mar 19, 2019, 12:54pm</small>
                      </div>
                      <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-0">$150.00</p>
                        <small class="tx-12 tx-danger mg-b-0">Declined</small>
                      </div>
                    </li>
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="fa fa-credit-card"></i></span></div>
                      <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-0">Payment from #023328</p>
                        <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 10:30pm</small>
                      </div>
                      <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-0">+ $129.50</p>
                        <small class="tx-12 tx-success mg-b-0">Completed</small>
                      </div>
                    </li>
                  </ul>
                  <div class="card-footer text-center tx-13">
                    <a href="" class="link-03">View All Transactions <i class="icon ion-md-arrow-down mg-l-5"></i></a>
                  </div><!-- card-footer -->
                </div><!-- card -->
              </div>


              <div class="col-md-4 mg-t-30">
                <div class="card">
                  <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                      <h6 class="mg-b-0">Recent Activities</h6>
                      <p class="tx-12 tx-color-03 mg-b-0">Last activity: 2 hours ago</p>
                    </div>
                  </div><!-- card-header -->
                  <div class="card-body pd-20">
                    <ul class="activity tx-13">
                      <li class="activity-item">
                        <div class="activity-icon bg-primary-light tx-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <div class="activity-body">
                          <p class="mg-b-2"><strong>Louise</strong> added a time entry to the ticket <a href="" class="link-02"><strong>Sales Revenue</strong></a></p>
                          <small class="tx-color-03">2 hours ago</small>
                        </div><!-- activity-body -->
                      </li><!-- activity-item -->
                      <li class="activity-item">
                        <div class="activity-icon bg-success-light tx-success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                        </div>
                        <div class="activity-body">
                          <p class="mg-b-2"><strong>Kevin</strong> added new attachment to the ticket <a href="" class="link-01"><strong>Software Bug Reporting</strong></a></p>
                          <small class="tx-color-03">5 hours ago</small>
                        </div><!-- activity-body -->
                      </li><!-- activity-item -->
                      <li class="activity-item">
                        <div class="activity-icon bg-warning-light tx-orange">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="15"></line></svg>
                        </div>
                        <div class="activity-body">
                          <p class="mg-b-2"><strong>Natalie</strong> reassigned ticket <a href="" class="link-02"><strong>Problem installing software</strong></a> to <strong>Katherine</strong></p>
                          <small class="tx-color-03">8 hours ago</small>
                        </div><!-- activity-body -->
                      </li><!-- activity-item -->
                      <li class="activity-item">
                        <div class="activity-icon bg-pink-light tx-pink">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </div>
                        <div class="activity-body">
                          <p class="mg-b-2"><strong>Katherine</strong> submitted new ticket <a href="" class="link-02"><strong>Payment Method</strong></a></p>
                          <small class="tx-color-03">Yesterday</small>
                        </div><!-- activity-body -->
                      </li><!-- activity-item -->
                      <li class="activity-item">
                        <div class="activity-icon bg-indigo-light tx-indigo">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </div>
                        <div class="activity-body">
                          <p class="mg-b-2"><strong>Katherine</strong> changed settings to ticket category <a href="" class="link-02"><strong>Payment &amp; Invoice</strong></a></p>
                          <small class="tx-color-03">2 days ago</small>
                        </div><!-- activity-body -->
                      </li><!-- activity-item -->
                    </ul><!-- activity -->
                  </div><!-- card-body -->
                </div><!-- card -->
              </div>

              <div class="col-md-4 mg-t-30">
                <div class="card">
                  <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                    <h6 class="mg-b-0">Agent Performance Points</h6>
                  </div><!-- card-header -->
                  <div class="card-body pd-t-25">
                    <div class="media">
                      <div class="avatar"><img src="assets/img/img6.jpg" class="rounded-circle" alt=""></div>
                      <div class="media-body mg-l-15">
                        <h6 class="tx-13 mg-b-2">Katherine Lumaad</h6>
                        <p class="tx-color-03 tx-12 mg-b-10">Technical Support</p>
                        <div class="progress ht-4 op-7 mg-b-5">
                          <div class="progress-bar wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between tx-12">
                          <span class="tx-color-03">Executive Level</span>
                          <strong class="tx-medium">12,312 points</strong>
                        </div>
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media mg-t-25">
                      <div class="avatar"><img src="assets/img/img1.png" class="rounded-circle" alt=""></div>
                      <div class="media-body mg-l-15">
                        <h6 class="tx-13 mg-b-2">Adrian Monino</h6>
                        <p class="tx-color-03 tx-12 mg-b-10">Sales Representative</p>
                        <div class="progress ht-4 op-7 mg-b-5">
                          <div class="progress-bar bg-success wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between tx-12">
                          <span class="tx-color-03">Master Level</span>
                          <strong class="tx-medium">10,044 points</strong>
                        </div>
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media mg-t-25">
                      <div class="avatar"><img src="assets/img/img6.jpg" class="rounded-circle" alt=""></div>
                      <div class="media-body mg-l-15">
                        <h6 class="tx-13 mg-b-2">Rolando Paloso</h6>
                        <p class="tx-color-03 tx-12 mg-b-10">Software Support</p>
                        <div class="progress ht-4 op-7 mg-b-5">
                          <div class="progress-bar bg-indigo wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between tx-12">
                          <span class="tx-color-03">Super Elite Level</span>
                          <strong class="tx-medium">7,500 points</strong>
                        </div>
                      </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media mg-t-20">
                      <div class="avatar"><img src="assets/img/img7.jpg" class="rounded-circle" alt=""></div>
                      <div class="media-body mg-l-15">
                        <h6 class="tx-13 mg-b-2">Dyanne Rose Aceron</h6>
                        <p class="tx-color-03 tx-12 mg-b-10">Sales Representative</p>
                        <div class="progress ht-4 op-7 mg-b-5">
                          <div class="progress-bar bg-pink wd-40p" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between tx-12">
                          <span class="tx-color-03">Elite Level</span>
                          <strong class="tx-medium">6,870 points</strong>
                        </div>
                      </div><!-- media-body -->
                    </div><!-- media -->
                  </div><!-- card-body -->
                </div><!-- card -->
              </div>

        </div>--}}
    </div>

</div>

</div>

@endsection

@section('js')
    @include('admin.includes.footer')
@endsection