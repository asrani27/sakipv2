@extends('admin.flatty')

@section('content') 
<div class='col-xs-12'>

  <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-tachometer'></i>
          <span>Dashboard</span>
      </h1>
  </div>

  <div class='alert alert-info alert-dismissable'>
      <a class='close' data-dismiss='alert' href='#'>&times;</a>
      Selamat Datang, 
      <strong>{{Auth::user()->name}}</strong>
      
  </div>
  
  <hr class='hr-drouble'>
  <div class='row'>
      <div class='col-sm-12 col-md-6'>
          <div class='box'>
              <div class='box-header'>
                  <div class='title'>
                      <div class='fa fa-inbox'></div>
                      Data 
                  </div>
                  <div class='actions'>
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class='row'>
                  <div class='col-sm-6'>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-error'>191</h3>
                          <small>SKPD</small>
                          <div class='text-error fa fa-inbox align-right'></div>
                      </div>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-warning'>311</h3>
                          <small>ASN</small>
                          <div class='text-warning fa fa-check-square-o align-right'></div>
                      </div>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-info'>3</h3>
                          <small>Pending</small>
                          <div class='text-info fa fa-clock-o align-right'></div>
                      </div>
                  </div>
                  <div class='col-sm-6'>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-primary'>3</h3>
                          <small>Shipped</small>
                          <div class='text-primary fa fa-truck align-right'></div>
                      </div>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-success'>981</h3>
                          <small>Completed</small>
                          <div class='text-success fa fa-flag align-right'></div>
                      </div>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-muted'>0</h3>
                          <small>Canceled</small>
                          <div class='text-muted fa fa-times align-right'></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class='col-sm-6 col-md-6'>
        
      </div>
      
  </div>
</div>
@endsection