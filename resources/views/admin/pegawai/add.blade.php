@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Tambah Pegawai</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="/data/pegawai" class="btn btn-info btn-sm"> 
                    <i class='fa fa-arrow-left'></i> Kembali</a> 
                </div>
                <div class="actions">
                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                    </a>
                </div>
            </div>
            <div class="box-content">
                <form action="/data/pegawai/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">NIP</label>
                    <div class="col-xs-5 col-md-10">
                        <input class="form-control" placeholder="NIP Pegawai" minlength="18" maxlength="18" name="nip" type="text">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Nama</label>
                    <div class="col-xs-5 col-md-10">
                      <input class="form-control" placeholder="Nama Pegawai" name="nama" type="text">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Eselon</label>
                    <div class="col-xs-5 col-md-10">
                      <select name="eselon_id" class="form-control">
                          <option value="">-Pilih-</option>
                          @foreach (eselon() as $item)
                              <option value="{{$item->id}}">{{$item->nama}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Pangkat</label>
                    <div class="col-xs-5 col-md-10">
                      <select name="pangkat_id" class="form-control">
                          <option value="">-Pilih-</option>
                          @foreach (pangkat() as $item)
                              <option value="{{$item->id}}">{{$item->nama}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">SKPD</label>
                    <div class="col-xs-5 col-md-10">
                      <select name="skpd_id" class="form-control">
                          <option value="">-Pilih-</option>
                          @foreach (skpd() as $item)
                              <option value="{{$item->id}}">{{$item->nama}}</option>
                          @endforeach
                      </select>
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