@extends('admin.flatty')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="col-xs-12">
<br />
<div class="col-sm-12">
  <div class="box">
      <div class="box-header orange-background">
          <div class="title">
              <a href="/info" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="actions">
              <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
              </a>
          </div>
      </div>
      <div class="box-content">
          <form action="/info/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
            @csrf
            <div class="form-group">
              <label class="control-label col-sm-1 col-xs-12">Judul</label>
              <div class="col-xs-5 col-md-10">
                  <input class="form-control" placeholder="Judul" name="judul" type="text">
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-1 col-xs-12">Isi</label>
              <div class="col-xs-5 col-md-10">
                <textarea id="summernote" name="isi"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1 col-xs-12"></label>
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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
        document.getElementById('summernote').focus();
        document.getElementById('summernote').select();
    });
</script>
@endpush