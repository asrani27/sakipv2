@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Tugas Pokok Dan Fungsi</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        <div class="box-header">
            {{-- <div class="title">
              <a href="/data/pegawai/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah Pegawai</a> 
            </div>
            <div class="actions">
                <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                </a>
            </div> --}}
        </div>
        <div class="box-content box-no-padding">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;">
                        <thead>
                        <tr class="blue-background" style="color: white">
                          <th>No</th>
                          <th>Jabatan</th>
                          <th>Tugas</th>
                          <th>Fungsi</th>
                          <th></th>
                        </tr>
                        </thead>
                        @php
                          $no =1;
                        @endphp
                        <tbody>
                          @foreach ($data as $item)        
                          <tr>
                              <td>{{$no++}}</td>
                              <td>Kepala {{$item->nama}}</td>
                              <td>
                                  @if (count($item->tugas) != 0)
                                      <ul>
                                      @foreach ($item->tugas as $tugas)
                                          <li>{{$tugas->isi}}</li>
                                      @endforeach
                                      </ul>
                                  @endif
                              </td>
                              <td>
                                  @if (count($item->fungsi) != 0)
                                      <ul>
                                      @foreach ($item->fungsi as $fungsi)
                                          <li>{{$fungsi->isi}}</li>
                                      @endforeach
                                      </ul>
                                  @endif
                              </td>
                              <td>
                                      <a href="/admin_skpd/tugas/add/{{$item->id}}" class="btn btn-xs btn-success">Tugas</a>
                                      <a href="/admin_skpd/fungsi/add/{{$item->id}}" class="btn btn-xs btn-success">Fungsi</a>     
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
  <h3>Jabatan</h3>
@endsection

@section('content') 
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Jabatan</th>
            <th>Tugas</th>
            <th>Fungsi</th>
            <th></th>
        </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($data as $item)        
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    @if (count($item->tugas) != 0)
                        <ul>
                        @foreach ($item->tugas as $tugas)
                            <li>{{$tugas->isi}}</li>
                        @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if (count($item->fungsi) != 0)
                        <ul>
                        @foreach ($item->fungsi as $fungsi)
                            <li>{{$fungsi->isi}}</li>
                        @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                        <a href="/admin_skpd/tugas/add/{{$item->id}}" class="btn btn-xs btn-success">Tugas</a>
                        <a href="/admin_skpd/fungsi/add/{{$item->id}}" class="btn btn-xs btn-success">Fungsi</a>     
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