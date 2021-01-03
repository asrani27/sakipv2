@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-sitemap'></i>
        <span>Pangkat</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="#"  data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm"> 
                    <i class='fa fa-plus'></i>Tambah Pangkat</a> 
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
                              <th>Nama</th>
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
                                  <td>{{$item->nama}}</td>
                                  <td>
                                    <a href="#" class="btn btn-xs btn-success edit-pangkat" data-id="{{$item->id}}" data-nama="{{$item->nama}}"><i class="fa fa-edit"></i></a>
                                        
                                    <a href="/data/pangkat/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
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

{{-- Tambah Pangkat --}}
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pangkat</h4>
      </div>
      <form method="POST" action="/data/pangkat/add">
          @csrf
      <div class="modal-body">
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pangkat</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" required>
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

{{-- Edit Pangkat --}}
<div class="modal fade" id="modal-default2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Pangkat</h4>
      </div>
      <form method="POST" action="/data/pangkat/edit">
          @csrf
      <div class="modal-body">
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pangkat</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" id="nama_p" required>
              <input type="hidden" class="form-control" name="id_pangkat" id="id_pangkat" readonly>
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

<script>
  $(document).on('click', '.edit-pangkat', function() {
      id = $(this).data('id');
      nama = $(this).data('nama');
      document.getElementById("id_pangkat").value = id;
      document.getElementById("nama_p").value = nama;
      $('#modal-default2').modal('show');
  });
  </script>
@endpush
