@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
  
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Tambah Program</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/pegawai/program" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/pegawai/program/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Indikator Kinerja </label>
                      <div class="col-xs-5 col-md-10">
                        <select name="indikator_iku_id" class="form-control" required>
                            <option value="">-Pilih-</option>
                            @foreach ($indikator_kinerja_utama as $item)
                            <option value="{{$item->id}}" {{$item->id == $data->pk_id ? 'selected':''}}>{{$item->tahun->tahun}} - {{$item->indikator_iku->indikator}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Nama Program</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="nama">{{$data->nama}}</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Satuan</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="satuan" class="form-control" value="{{$data->satuan}}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Triwulan I</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tw1" class="form-control" value="{{$data->tw1}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Triwulan II</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tw2" class="form-control" value="{{$data->tw2}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Triwulan III</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tw3" class="form-control" value="{{$data->tw3}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Target Triwulan IV</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" name="tw4" class="form-control" value="{{$data->tw4}}">
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