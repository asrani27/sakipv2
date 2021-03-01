@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Edit Pegawai</span>
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
                <form action="/admin_skpd/pegawai/edit/{{$data->id}}" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                  @csrf
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">NIP</label>
                    <div class="col-xs-5 col-md-10">
                      <input type="text" class="form-control" name="nip" value="{{$data->nip}}" minlength="18" maxlength="18">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Nama</label>
                    <div class="col-xs-5 col-md-10">
                      <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12">Eselon</label>
                    <div class="col-xs-5 col-md-10">
                      <select name="eselon_id" class="form-control">
                          <option value="">-Pilih-</option>
                          @foreach (eselon() as $item)
                              <option value="{{$item->id}}" {{$data->eselon_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
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
                              <option value="{{$item->id}}" {{$data->pangkat_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
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
                        <option value="{{$data->unit_kerja_id}}">{{$data->unitkerja->nama}}</option>
                        @foreach (jabDinas() as $item)
                            <option value="{{$item->id}}" {{ $data->unit_kerja_id == $item->id ? 'selected' : '' }}>Kepala {{$item->nama}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label col-sm-2 col-xs-12"></label>
                    <div class="col-xs-5 col-md-10">
                      
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
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