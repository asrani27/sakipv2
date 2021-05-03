@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Target</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/pegawai/pk" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/pegawai/pk/target/{{$data->id}}" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Tahun</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" class="form-control" name="tahun" readonly value="{{$data->tahun->tahun}}">
                        <input type="hidden" class="form-control" name="tahun_id" readonly value="{{$data->tahun->id}}">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Kinerja Utama</label>
                      <div class="col-xs-5 col-md-10">
                        @if (Auth::user()->pegawai->jabatan->tingkat == 1)
                        <textarea class="form-control" name="kinerja_utama" readonly>{{$data->iku2->kinerja_utama}}</textarea>                          
                        @elseif(Auth::user()->pegawai->jabatan->tingkat == 2)
                        <textarea class="form-control" name="kinerja_utama" readonly>{{$data->iku3->kinerja_utama}}</textarea>
                        @elseif(Auth::user()->pegawai->jabatan->tingkat == 3)
                        <textarea class="form-control" name="kinerja_utama" readonly>{{$data->iku4->kinerja_utama}}</textarea>
                        @endif
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Indikator</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="indikator" readonly>{{$data->indikator}}</textarea>
                      </div>
                    </div> 
                    <div class="form-group row">
                        <label class="control-label col-sm-2 col-xs-12">Target</label>
                        <div class="col-xs-5 col-md-10">
                          <input type="text" class="form-control" name="target" required>
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