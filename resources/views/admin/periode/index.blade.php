@extends('admin.flatty')
@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('title')
  <h3>PERIODE</h3>
@endsection

@section('content') 

<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-calendar'></i>
        <span>Periode</span>
    </h1>
  </div>
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="#"  data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm">
                    <i class='fa fa-plus'></i>Tambah Periode</a> 
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
                              <th>Periode</th>
                              <th>Tahun</th>
                              <th>Status</th>
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
                                      <td>{{$item->mulai}} - {{$item->sampai}}</td>
                                      <td>
                                          <button href="#" class="btn btn-xs btn-success add-tahun" data-id="{{$item->id}}"><i class="fa fa-plus"></i> Tambah Tahun</button>
                                          @if($item->tahun == null)
                                              -
                                          @else
                                          <ul>
                                              @foreach ($item->tahun as $item2)
                                              <li>
                                              {{$item2->tahun}}, berlaku ({{\Carbon\Carbon::parse($item2->mulai_berlaku)->format('d M Y')}} - {{\Carbon\Carbon::parse($item2->akhir_berlaku)->format('d M Y')}}) <a href="/data/tahun/delete/{{$item2->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Tahun ini?');"><i class="fa fa-trash"></i></a>
                                              </li>
                                              @endforeach
                                          </ul>
                                          @endif
                                      </td>
                                      <td>
                                        @if ($item->is_aktif == 1)
                                        <span class="label label-success">Aktif</span>
                                        @else
                                        <span class="label label-inverse">Tidak Aktif</span>
                                        @endif
                                      </td>
                                      <td>
                                        @if ($item->is_aktif != 1)
                                        <a href="/data/periode/aktifkan/{{$item->id}}" class="btn btn-xs btn-info" onclick="return confirm('Yakin Ingin Mengaktifkan periode ini?');">Aktifkan</a>
                                        @else
                                        
                                        @endif

                                          <button href="#" class="btn btn-xs btn-warning edit-periode" data-id="{{$item->id}}" data-mulai="{{$item->mulai}}" data-sampai="{{$item->sampai}}"><i class="fa fa-edit"></i></button>
                                          
                                          <a href="/data/periode/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
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

{{-- Tambah Periode --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Periode</h4>
        </div>
        <form method="POST" action="/data/periode/add">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="mulai" placeholder="2021" required>
                </div>
                <div class="col-sm-1">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">S/D</label>
                </div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="sampai" placeholder="2025" required>
                </div>
              </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Edit Periode --}}
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Periode</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/data/periode/edit">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="mulai" id="mulai" required>
                </div>
                <div class="col-sm-1">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">S/D</label>
                </div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="sampai" id="sampai" required>
                <input type="hidden" class="form-control" name="id_periode" id="id_edit_periode" required>
                </div>
              </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- Tambah Tahun --}}
<div class="modal fade" id="modal-default3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Tahun</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/data/tahun/add">
            @csrf
            <div class="modal-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="tahun" required>
                <input type="hidden" class="form-control" name="periode_id" id="id_periode_tahun" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Mulai Berlaku</label>
                <div class="col-sm-4">
                <input type="date" class="form-control" name="mulai_berlaku" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Sampai</label>
                <div class="col-sm-4">
                <input type="date" class="form-control" name="akhir_berlaku" required>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
<script>
    $(document).on('click', '.edit-periode', function() {
        mulai = $(this).data('mulai');
        id_periode = $(this).data('id');
        sampai = $(this).data('sampai');
        document.getElementById("mulai").value = mulai;
        document.getElementById("sampai").value = sampai;
        document.getElementById("id_edit_periode").value = id_periode;
        $('#modal-default2').modal('show');
    });
    
    $(document).on('click', '.add-tahun', function() {
        id_periode_tahun = $(this).data('id');
        document.getElementById("id_periode_tahun").value = id_periode_tahun;
        $('#modal-default3').modal('show');
    });
</script>
@endpush