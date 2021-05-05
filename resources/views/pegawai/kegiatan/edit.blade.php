@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
  
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Edit Kegiatan</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/pegawai/kegiatan" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/pegawai/kegiatan/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Indikator Es IV</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="indikator_id" class="form-control" required>
                          <option value="">-Pilih-</option>
                          @foreach ($indikator_kasi as $item)
                              <option value="{{$item->id}}" {{$data->indikator_iku4_id == $item->id ? 'selected':''}}>Tahun: {{$item->tahun->tahun}}, {{$item->indikator}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Nama Kegiatan</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="kegiatan">{{$data->nama}}</textarea>
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