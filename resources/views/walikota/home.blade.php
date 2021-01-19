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
                          <h3 class='title text-error'>{{countSKPD()}}</h3>
                          <small>SKPD</small>
                          <div class='text-error fa fa-inbox align-right'></div>
                      </div>
                  </div>
                  <div class='col-sm-6'>
                      <div class='box-content box-statistic'>
                          <h3 class='title text-primary'>{{countASN()}}</h3>
                          <small>ASN</small>
                          <div class='text-primary fa fa-users align-right'></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
  </div>
  
    <div class='group-header'>
        <div class='row'>
            <div class='col-sm-6 col-sm-offset-3'>
                <div class='text-center'>
                    <h2>Verifikasi IKU Dinas</h2>
                    <small class='text-muted'>Di Bawah ini Adalah IKU Dinas yang Belum Di Verifikasi</small>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box bordered-box purple-border' style='margin-bottom:0;'>
                <div class='box-header purple-background'>
                    <div class='title'>Satuan Kerja Perangkat Daerah</div>
                    
                </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                            <table class='table table-hover table-striped' style='margin-bottom:0;'>
                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1;
                                    @endphp
                                <tr>
                                    @foreach ($result as $item)
                                    @if ($item->iku != 0)
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>
                                            <span class="label label-info">MENUNGGU</span>
                                        </td>
                                        <td>
                                            
                                            <a class='btn btn-primary btn-xs' href='/walikota/iku/lihat/{{$item->id}}'>
                                                <i class='fa fa-eye'></i> LIHAT
                                            </a>
                                            <a class='btn btn-success btn-xs' href='/walikota/iku/verif/{{$item->id}}'>
                                                <i class='fa fa-check'></i> SETUJUI
                                            </a>
                                        </td>
                                    @endif
                                    @endforeach
                                    {{-- <td>Carrie Christiansen</td>
                                    <td>claude@hotmail.com</td>
                                    <td>
                                        <span class='label label-important'>Important</span>
                                    </td>
                                    <td>
                                        <div class='text-right'>
                                            <a class='btn btn-success btn-xs' href='#'>
                                                <i class='fa fa-check'></i>
                                            </a>
                                            <a class='btn btn-danger btn-xs' href='#'>
                                                <i class='fa fa-times'></i>
                                            </a>
                                        </div>
                                    </td> --}}
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class='group-header'>
        <div class='row'>
            <div class='col-sm-6 col-sm-offset-3'>
                <div class='text-center'>
                    <h2>Verifikasi Perjanjian Kinerja</h2>
                    <small class='text-muted'>Di Bawah ini Adalah PK yang Belum Di Verifikasi</small>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box bordered-box green-border' style='margin-bottom:0;'>
                <div class='box-header green-background'>
                    <div class='title'>Satuan Kerja Perangkat Daerah</div>
                    
                </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                            <table class='table table-hover table-striped' style='margin-bottom:0;'>
                                <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                            </table>
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