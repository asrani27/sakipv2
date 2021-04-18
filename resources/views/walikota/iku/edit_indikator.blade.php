@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
  
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Edit Indikator</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/walikota/iku" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/walikota/iku/edit_indikator/{{$data->id}}" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                        
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Kinerja Utama</label>
                      <div class="col-xs-12 col-md-10">
                        <input type="text" value="{{$data->iku_kota->kinerja_utama}}" readonly class="form-control">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">indikator Kinerja Utama</label>
                      <div class="col-xs-12 col-md-10">
                        <textarea class="form-control" name="indikator" rows="4">{{$data->indikator}}</textarea>
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