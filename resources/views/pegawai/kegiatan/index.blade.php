@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Kegiatan Dan Aktivitas</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        <div class="alert alert-success alert-dismissable">
          <h4>
              <i class="fa fa-user"></i>
              Biodata
          </h4>
          <table>
            <tr>
              <td>NIP</td>
              <td>: {{biodata()['nip']}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>: {{biodata()['nama']}}</td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>: {{biodata()['jabatan']}}</td>
            </tr>
            <tr>
              <td>SKPD</td>
              <td>: {{biodata()['skpd']}}</td>
            </tr>
          </table>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="title">
              <a href="/pegawai/kegiatan/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah</a> 
            </div>
          </div>
          <form target="_blank" method="post" action="/pegawai/kegiatan/print">
            @csrf
          <div class="col-sm-3">
              <select name="tahun_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach ($tahun as $item)
                    <option value="{{$item->id}}">Tahun: {{$item->tahun}}, Periode: {{$item->periode->mulai}}/{{$item->periode->sampai}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-sm-5">
            <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
          </div>
          </form>
          <div class="col-sm-3">
              <form method="GET" action="/pegawai/iku/search">
                <input class="form-control" name="search" placeholder="Search" type="text">
              </form>
          </div>
        </div>
        <div class="box-content box-no-padding">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped responsive-table" style="margin-bottom:0;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          <th>NO</th>
                          <th>PERIODE</th>
                          <th>TAHUN</th>
                          <th>INDIKATOR KINERJA</th>
                          <th>KEGIATAN</th>
                          <th>AKTIVITAS</th>
                          <th>TARGET KEUANGAN</th>
                          <th></th>
                        </tr>
                        </thead>
                        @php
                          $no =1;
                        @endphp
                        <tbody>
                          
                          @foreach ($data as $item)        
                          <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                              <td>{{$no++}}</td>
                             
                              
                          </tr>
                          
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
        {{$data->links()}}
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
              {{-- {{$data->links()}} --}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush
