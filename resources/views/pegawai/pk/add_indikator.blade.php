@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Tambah Indikator & Target</span>
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
                  <form action="/pegawai/pk/indikator/{{$data->id}}" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Tahun</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" class="form-control" name="tahun" readonly value="{{$data->tahun->tahun}}">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Kinerja Utama</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="kinerja_utama" readonly>{{$data->kinerja_utama}}</textarea>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Indikator</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="indikator" required></textarea>
                      </div>
                    </div> 
                    <div class="form-group row">
                        <label class="control-label col-sm-2 col-xs-12">Target</label>
                        <div class="col-xs-5 col-md-10">
                          <input type="text" class="form-control" name="target">
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
        <a href="/pegawai/pk" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a> <br/><br/>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tambah Indikator Dan Target</h3>
            </div>
            <!-- /.card-header -->
            <form class="form-horizontal" method="post" action="/pegawai/pk/indikator/{{$data->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tahun" readonly value="{{$data->tahun->tahun}}">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kinerja Utama</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="kinerja_utama" readonly>{{$data->kinerja_utama}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Indikator Kinerja</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="indikator" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Target</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="target">
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-save"></i> Simpan</button>
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