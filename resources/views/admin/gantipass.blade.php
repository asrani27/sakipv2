@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-key'></i>
          <span>Ganti Password</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/ganti-password" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Username</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" class="form-control" name="username" readonly value="{{Auth::user()->username}}">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Masukkan Password Baru</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" class="form-control" name="password" value="">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Masukkan Password Baru Lagi</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" class="form-control" name="password2" value="">
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