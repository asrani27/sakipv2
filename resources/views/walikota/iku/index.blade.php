@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>IKU (Indikator Kinerja Utama) Walikota</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
      
        <div class="row">
          <div class="col-sm-6">
            <div class="title">
              <a href="/walikota/iku/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah IKU</a> 
            </div>
          </div>
          <div class="col-sm-3">
          </div>
          <div class="col-sm-3">
              <form method="GET" action="/walikota/iku/search">
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
                          <th>KINERJA UTAMA</th>
                          <th>INDIKATOR KINERJA</th>
                          <th>PENJELASAN</th>
                          <th>SUMBER DATA</th>
                          <th>PENANGGUNG JAWAB</th>
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
                              <td>{{$item->kinerja_utama}}</td>
                              <td>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($item->indikator as $ind)
                                   {{$no++}}. {{$ind->indikator}} <a href="/walikota/iku/edit_indikator/{{$ind->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Indikator"><i class="fa fa-edit"></i></a> |  <a href="/walikota/iku/hapus_indikator/{{$ind->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Hapus Indikator"  onclick="return confirm('Yakin Ingin Menghapus Indikator ini?');"><i class="fa fa-trash"></i></a> <br/> <br/>
                                @endforeach
                              </td>
                              <td>{{$item->penjelasan}}</td>
                              <td>{{$item->sumber_data}}</td>
                              <td>{{$item->penanggung_jawab}}</td>
                            
                              <td>
                                      <a href="/walikota/iku/add_indikator/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Indikator</a>
                                      <a href="/walikota/iku/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                      <a href="/walikota/iku/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i> Hapus</a>     
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