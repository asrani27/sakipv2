@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-sitemap'></i>
        <span>Eselon</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="#"  data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm"> 
                    <i class='fa fa-plus'></i>Tambah Eselon</a> 
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
                                        <a href="#" class="btn btn-xs btn-success edit-eselon" data-id="{{$item->id}}" data-nama="{{$item->nama}}"><i class="fa fa-edit"></i></a>
                                        
                                        <a href="/data/eselon/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
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

{{-- Tambah Eselon --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Eselon</h4>
        </div>
        <form method="POST" action="/data/eselon/add">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Eselon</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="nama" placeholder="IIIa" required>
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

{{-- Edit Eselon --}}
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Eselon</h4>
        </div>
        <form method="POST" action="/data/eselon/edit">
            @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Eselon</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="nama" id="nama_e" placeholder="IIIa" required>
                <input type="hidden" class="form-control" name="id_eselon" id="id_eselon" readonly>
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

$(document).on('click', '.edit-eselon', function() {
    id = $(this).data('id');
    nama = $(this).data('nama');
    document.getElementById("id_eselon").value = id;
    document.getElementById("nama_e").value = nama;
    $('#modal-default2').modal('show');
});
</script>
@endpush