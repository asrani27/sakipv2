@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Tambah Fungsi {{$jabatan->nama}}</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="/admin_skpd/tupoksi" class="btn btn-info btn-sm"> 
                    <i class='fa fa-arrow-left'></i> Kembali</a> 
                </div>
                <div class="actions">
                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                    </a>
                </div>
            </div>
            <div class="box-content">
                <form action="/admin_skpd/fungsi/add/{{$jabatan->id}}" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Tanggal Mulai Berlaku</label>
                    <div class="col-xs-5 col-md-10">
                        <input class="form-control" name="mulai_berlaku" type="date" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Tanggal berakhir</label>
                    <div class="col-xs-5 col-md-10">
                      <input class="form-control" name="akhir_berlaku" type="date" required>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">No</label>
                    <div class="col-xs-5 col-md-10">
                      <input class="form-control" name="no" type="text">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Isi</label>
                    <div class="col-xs-5 col-md-10">
                      <input class="form-control" name="isi" type="text">
                    </div>
                  </div>                   
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12"></label>
                    <div class="col-xs-5 col-md-10">
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                  
                </form>
            </div>
        </div>
    </div>
  </div>
<br />
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            
            <div class="box-content box-no-padding">
                <div class="responsive-table">
                    <div class="scrollable-area">
                        <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;">
                            <thead>
                            <tr class="blue-background" style="color: white">
                              <th>No</th>
                              <th>No Fungsi</th>
                              <th>Isi Fungsi</th>
                              <th>Mulai Berlaku</th>
                              <th>Akhir Berlaku</th>
                              <th></th>
                            </tr>
                            </thead>
                            @php
                              $no =1;
                            @endphp
                            <tbody>
                              @foreach ($data as $item)
                                  <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$item->no}}</td>
                                    <td>{{$item->isi}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->mulai_berlaku)->format('d M Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->akhir_berlaku)->format('d M Y')}}</td>
                                    <td>
                                        
                                    <a href="/admin_skpd/fungsi/edit/{{$item->id}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                                    <a href="/admin_skpd/fungsi/delete/{{$item->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Di Hapus?');"><i class="fa fa-trash"></i></a> 
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
{{-- 
@extends('admin.app')

@push('css') 

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <a href="/admin_skpd/tupoksi" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a> <br/><br/>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Fungsi {{$jabatan->nama}}</h3>
            </div>
            <!-- /.card-header -->
            <form class="form-horizontal" method="post" action="/admin_skpd/fungsi/add/{{$jabatan->id}}">
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Isi Fungsi</label>
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
              <th>No Fungsi</th>
              <th>Isi Fungsi</th>
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
                    <td>{{$no++}}</td>
                    <td>{{$item->no}}</td>
                    <td>{{$item->isi}}</td>
                    <td>{{$item->perwal}}</td>
                    <td>{{$item->mulai_berlaku}}</td>
                    <td>{{$item->akhir_berlaku}}</td>
                    <td>
                        
                    <a href="/admin_skpd/fungsi/edit/{{$item->id}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> 
                    <a href="/admin_skpd/fungsi/delete/{{$item->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Di Hapus?');"><i class="fas fa-trash"></i></a> 
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

@endpush --}}