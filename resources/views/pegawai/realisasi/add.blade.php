@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">  
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Realisasi</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/pegawai/realisasi" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/pegawai/realisasi/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Pilih Tahun</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="tahun_id" class="form-control" required>
                          <option value="">-Pilih-</option>
                          @foreach ($tahun as $item)
                              <option value="{{$item->id}}">Tahun: {{$item->tahun}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Pilih Triwulan</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="triwulan" class="form-control" required>
                          <option value="">-Pilih-</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Pilih Sasaran</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="indikator_id" class="form-control" required>
                          <option value="">-Pilih-</option>
                          @foreach ($indikator as $item)
                              <option value="{{$item->id}}">{{$item->kinerja_utama}}</option>
                          @endforeach
                        </select>
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