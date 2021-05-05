@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">  
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Tambah Aktivitas</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/pegawai/aktivitas" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/pegawai/aktivitas/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Pilih Kegiatan</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="kegiatan_id" class="form-control" required>
                          <option value="">-Pilih-</option>
                          @foreach ($kegiatan as $item)
                              <option value="{{$item->id}}">Tahun: {{$item->tahun->tahun}}, {{$item->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Nama Aktivitas</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="nama"></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Keuangan TW I</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tk1" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Keuangan TW II</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tk2" class="form-control">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Keuangan TW III</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tk3" class="form-control">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Keuangan TW IV</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tk4" class="form-control">
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
</div>

@endsection

@push('js')

@endpush