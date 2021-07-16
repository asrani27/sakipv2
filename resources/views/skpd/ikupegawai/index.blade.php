@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>IKU (Indikator Kinerja Utama)</span>
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
              <td>: {{$pegawai->nip}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>: {{$pegawai->nama}}</td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>: {{$pegawai->jabatan->nama}}</td>
            </tr>
            <tr>
              <td>SKPD</td>
              <td>: {{$pegawai->jabatan->skpd->nama}}</td>
            </tr>
          </table>
        </div>
        <div class="row">
          <div class="col-sm-1">
            <div class="title">
              <a href="/admin_skpd/pegawai/iku/{{$pegawai->id}}/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah IKU</a> 
            </div>
          </div>
          <form target="_blank" method="post" action="/pegawai/iku/print">
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
                          @if ($pegawai->jabatan->tingkat == 3)
                          <th>PROGRAM</th>
                          @endif
                          <th>KINERJA UTAMA</th>
                          <th>INDIKATOR KINERJA</th>
                          <th>PENJELASAN</th>
                          <th>SUMBER DATA</th>
                          <th>PENANGGUNG JAWAB</th>
                          <th>VERIFIKASI</th>
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
                              <td>{{$item->periode->mulai}}-{{$item->periode->sampai}} </td>
                              <td>{{$item->tahun->tahun}}</td>
                              @if ($pegawai->jabatan->tingkat == 3)
                              <td>{{$item->program->nama}}</td>
                              @endif
                              <td>{{$item->kinerja_utama}}</td>
                              @if ($pegawai->jabatan->tingkat == 1)
                                  @include('pegawai.iku.iku2')
                              @elseif($pegawai->jabatan->tingkat == 2)
                                  @include('pegawai.iku.iku3')
                              @elseif($pegawai->jabatan->tingkat == 3)
                                  @include('pegawai.iku.iku4')    
                              @endif
                              <td>
                                @if ($item->verifikasi == 0)
                                  <span class="label label-info">MENUNGGU</span>
                                @else
                                  <span class="label label-success">DISETUJUI</span>  
                                @endif
                              </td>
                              <td>
                                      <a href="/admin_skpd/pegawai/iku/add_indikator/{{$pegawai->id}}/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Indikator</a><br>
                                      <a href="/admin_skpd/pegawai/iku/edit/{{$pegawai->id}}/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a><br>
                                      <a href="/admin_skpd/pegawai/iku/delete/{{$pegawai->id}}/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i> Hapus</a> <br> 
                                      
                              </td>
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
{{-- 
@extends('admin.app')
@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('title')
  <h3>Indikator Kinerja Utama</h3>
@endsection

@section('content') 
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="/pegawai/iku/add" class="btn btn-xs btn-primary">Tambah IKU</a>
          </div>
      <div class="card-body">
        <table id="example1" class="table table-sm table-bordered table-striped"  >
        <thead>
        <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
            <th>No</th>
            <th>Kinerja Utama</th>
            <th>Indikator Kinerja Utama</th>
            <th>Penjelasan</th>
            <th>Sumber Data</th>
            <th>Penanggung jawab</th>
            <th></th>
        </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($data as $item)        
            <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                <td>{{$no++}}</td>
                <td>{{$item->kinerja_utama}}</td>
                <td>{{$item->indikator_kinerja_utama}}</td>
                <td>{{$item->penjelasan}}</td>
                <td>{{$item->sumber_data}}</td>
                <td>{{$item->penanggung_jawab}}</td>
            
                <td>
                        <a href="/pegawai/iku/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="/pegawai/iku/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fas fa-trash"></i></a>     
                </td>
            </tr>
            
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')

<!-- DataTables -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endpush --}}