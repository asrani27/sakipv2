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

@endpush