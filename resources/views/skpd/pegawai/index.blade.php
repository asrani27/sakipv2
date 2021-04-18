@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Pegawai {{Auth::user()->skpd->nama}}</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        <div class="box-header">
            <div class="title">
              <a href="/admin_skpd/pegawai/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah Pegawai</a> 
            </div>
            <div class="actions">
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div>
        </div>
        <div class="box-content box-no-padding">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;">
                        <thead>
                        <tr class="blue-background" style="color: white">
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Eselon</th>
                          <th>Pangkat</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        @php
                          $no =1;
                        @endphp
                        <tbody>
                          @foreach ($data as $item)        
                          <tr>
                              <td>{{$no++}}</td>
                              <td>{{$item->nip}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->eselon == null ? '-' : $item->eselon->nama}}</td>
                              <td>{{$item->pangkat == null ? '-' : $item->pangkat->nama}}</td>
                              <td>{{$item->jabatan == null ? '-' : $item->jabatan->nama}}</td>
                              <td>
                                  @if ($item->user == null)
                                      <a href="/admin_skpd/pegawai/createuser/{{$item->id}}" class="btn btn-xs btn-success">Buat User</a>
                                  @endif
                                  <a href="/admin_skpd/pegawai/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                  
                                  <a href="/admin_skpd/pegawai/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
              {{$data->links()}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush

@extends('admin.app')
@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('title')
  <h3>Data Pegawai</h3>
@endsection

@section('content') 
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <a href="/admin_skpd/pegawai/add" class="btn btn-primary btn-sm">Tambah Pegawai</a> <br/><br/>
        <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Unit Kerja</th>
            <th>Eselon</th>
            <th>Pangkat</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        @php
            $no =1;
        @endphp
        <tbody>
            @foreach ($data as $item)        
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->nip}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->skpd == null ? '-' : $item->skpd->nama}}</td>
                <td>{{$item->eselon == null ? '-' : $item->eselon->nama}}</td>
                <td>{{$item->pangkat == null ? '-' : $item->pangkat->nama}}</td>
                <td>{{$item->jabatan == null ? '-' : $item->jabatan->nama}}</td>
                <td>
                    @if ($item->user == null)
                        <a href="/admin_skpd/pegawai/createuser/{{$item->id}}" class="btn btn-xs btn-success">Buat User</a>
                    @endif
                    <a href="/admin_skpd/pegawai/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                    
                    <a href="/admin_skpd/pegawai/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fas fa-trash"></i></a>
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
@endpush