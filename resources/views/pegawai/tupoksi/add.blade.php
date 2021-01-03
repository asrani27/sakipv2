@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Tambah Tugas</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="/pegawai/tupoksi" class="btn btn-info btn-sm"> 
                    <i class='fa fa-arrow-left'></i> Kembali</a> 
                </div>
                <div class="actions">
                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                    </a>
                </div>
            </div>
            <div class="box-content">
                <form action="/pegawai/tugas/add/{{$jabatan->id}}" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
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
                    <label class="control-label col-sm-2 col-xs-12">No Perwal</label>
                    <div class="col-xs-5 col-md-10">
                      <input class="form-control" name="perwal" type="text">
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
                              <th>No Tugas</th>
                              <th>Tugas</th>
                              <th>Perwal</th>
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
                                    <td>{{$item->perwal}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->mulai_berlaku)->format('d M Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->akhir_berlaku)->format('d M Y')}}</td>
                                    <td>
                                        
                                    <a href="/pegawai/tugas/edit/{{$item->id}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                                    <a href="/pegawai/tugas/delete/{{$item->id}}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Di Hapus?');"><i class="fa fa-trash"></i></a> 
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