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
      @if (!Auth::user()->hasRole('admin'))
          (Kepala {{Auth::user()->pegawai->unitkerja->nama}})
      @endif
      
  </div>
  
  <hr class='hr-drouble'>
  <div class='row'>
      <div class='col-sm-12 col-md-12'>
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
                          <h3 class='title text-error'>{{Auth::user()->skpd->nama}}</h3>
                          <small>SKPD</small>
                          <div class='text-error fa fa-inbox align-right'></div>
                      </div>
                  </div>
                  <div class='col-sm-6'>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-primary'>{{$countPegawai}}</h3>
                          <small>ASN</small>
                          <div class='text-primary fa fa-users align-right'></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
  </div>
</div>
@endsection

@push('js')
    

@endpush