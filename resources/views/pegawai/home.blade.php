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
          (Kepala {{Auth::user()->pegawai->jabatan->nama}})
      @endif
      
  </div>
    <div class='group-header'>
        <div class='row'>
            <div class='col-sm-6 col-sm-offset-3'>
                <div class='text-center'>
                    <h2>Verifikasi IKU</h2>
                    <small class='text-muted'>Di Bawah ini Adalah IKU yang Belum Di Verifikasi</small>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box bordered-box purple-border' style='margin-bottom:0;'>
                <div class='box-header purple-background'>
                    <div class='title'>Unit Kerja</div>
                    
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
                                        Kinerja Utama
                                    </th>
                                    {{-- <th>
                                        Indikator
                                    </th> --}}
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
                                    @foreach ($iku as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->jabatan->nama}}</td>
                                        <td>{{$item->kinerja_utama}}</td>
                                        {{-- <td>{{$item->indikator_kinerja_utama}}</td> --}}
                                        <td>
                                            <span class="label label-info">MENUNGGU</span>
                                        </td>
                                        <td>
                                            <a class='btn btn-success btn-xs' href='/pegawai/iku/verif/{{$item->id}}'>
                                                <i class='fa fa-check'></i> SETUJUI
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                
                                </tbody>
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