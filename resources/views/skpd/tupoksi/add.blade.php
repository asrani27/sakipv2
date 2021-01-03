@extends('admin.app')

@push('css') 

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <a href="/admin_skpd/tupoksi" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a> <br/><br/>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tugas {{$jabatan->nama}}</h3>
            </div>
            <!-- /.card-header -->
            <form class="form-horizontal" method="post" action="/admin_skpd/tugas/add/{{$jabatan->id}}">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Mulai Berlaku</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" name="mulai_berlaku">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Berakhir</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" name="akhir_berlaku">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="no">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="isi"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No Perwal</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="perwal">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i> Simpan</button>
                </div>
                <!-- /.card-footer -->
            </form>
            <!-- /.card-body -->
          </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
      <div class="card card-primary card-outline">
        <div class="card-body">
          <table id="example1" class="table table-sm table-bordered table-striped">
          <thead>
          <tr>
              <th>No</th>
              <th>No Tugas</th>
              <th>Tugas</th>
              <th>Perwal</th>
              <th>Mulai Berlaku</th>
              <th>Akhir Berlaku</th>
              <th></th>
          </tr>
          </thead>
          @php
              $no=1;
          @endphp
          <tbody>
              @foreach ($data as $item)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$item->no}}</td>
                    <td>{{$item->isi}}</td>
                    <td>{{$item->perwal}}</td>
                    <td>{{$item->mulai_berlaku}}</td>
                    <td>{{$item->akhir_berlaku}}</td>
                    <td>
                        
                    <a href="/admin_skpd/tugas/edit/{{$item->id}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> 
                    <a href="/admin_skpd/tugas/delete/{{$item->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Di Hapus?');"><i class="fas fa-trash"></i></a> 
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

@endpush