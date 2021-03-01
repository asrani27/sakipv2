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
                  <a href="/admin_skpd/pegawai" class="btn btn-info btn-sm"> 
                    <i class='fa fa-arrow-left'></i> Kembali</a> 
                </div>
                <div class="actions">
                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                    </a>
                </div>
            </div>
            <div class="box-content">
                <form action="/admin_skpd/pegawai/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">NIP</label>
                    <div class="col-xs-5 col-md-10">
                      <input type="text" class="form-control" name="nip"  minlength="18" maxlength="18">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Nama</label>
                    <div class="col-xs-5 col-md-10">
                      <input type="text" class="form-control" name="nama">
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
                    <label class="control-label col-sm-2 col-xs-12">Dinas</label>
                    <div class="col-xs-5 col-md-10">
                      <input type="text" value="{{dinasSaya()->nama}}" class="form-control" readonly>
                      <input type="hidden" name="skpd_id" value="{{dinasSaya()->id}}" class="form-control" readonly>
                    </div>
                  </div> 
                  
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Jabatan Tersedia</label>
                    <div class="col-xs-5 col-md-10">
                      <select name="unit_kerja_id" class="form-control">
                        <option value="">-Pilih-</option>
                        @foreach (jabDinas() as $item)
                            <option value="{{$item->id}}">Kepala {{$item->nama}}</option>
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
{{-- 
@extends('admin.app')

@push('css') 

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <a href="/admin_skpd/pegawai" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a> <br/><br/>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <form class="form-horizontal" method="post" action="/admin_skpd/pegawai/edit/{{$data->id}}">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nip" value="{{$data->nip}}" minlength="18" maxlength="18">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Eselon</label>
                    <div class="col-sm-10">
                        <select name="eselon_id" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach (eselon() as $item)
                                <option value="{{$item->id}}" {{$data->eselon_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pangkat</label>
                    <div class="col-sm-10">
                        <select name="pangkat_id" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach (pangkat() as $item)
                                <option value="{{$item->id}}" {{$data->pangkat_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Kerja</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{dinasSaya()->nama}}" class="form-control" readonly>
                        <input type="hidden" name="skpd_id" value="{{dinasSaya()->id}}" class="form-control" readonly>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan Tersedia</label>
                    <div class="col-sm-10">
                        <select name="jabatan_id" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach (jabDinas() as $item)
                                <option value="{{$item->id}}" {{ old('jabatan_id') == $item->id ? 'selected' : '' }}>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Update</button>
                </div>
                <!-- /.card-footer -->
            </form>
            <!-- /.card-body -->
          </div>
    </div>
</div>
@endsection

@push('js')

@endpush --}}
