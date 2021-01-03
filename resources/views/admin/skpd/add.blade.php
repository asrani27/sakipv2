@extends('admin.flatty')

@push('css')

@endpush

@section('content')

<div class="col-xs-12">
<br />
<div class="col-sm-12">
  <div class="box">
      <div class="box-header orange-background">
          <div class="title">
              <a href="/data/skpd" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="actions">
              <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
              </a>
          </div>
      </div>
      <div class="box-content">
          <form action="/data/skpd/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
            @csrf
            <div class="form-group">
              <label class="control-label col-sm-2 col-xs-12">Kode SKPD</label>
              <div class="col-xs-5 col-md-10">
                  <input class="form-control" placeholder="Kode" name="kode_skpd" type="text">
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-2 col-xs-12">Nama SKPD</label>
              <div class="col-xs-5 col-md-10">
                <input class="form-control" placeholder="Nama SKPD" name="nama" type="text">
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

@endsection

@push('js')

@endpush
