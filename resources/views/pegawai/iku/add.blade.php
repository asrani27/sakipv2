@extends('admin.app')

@push('css') 

@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <a href="/pegawai/iku" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a> <br/><br/>
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Tambah IKU</h3>
            </div>
            <!-- /.card-header -->
            <form class="form-horizontal" method="post" action="/pegawai/iku/add">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Periode</label>
                      <div class="col-sm-10">
                          <select name="periode_id" class="form-control">
                            @foreach (periode() as $item)
                                <option value="{{$item->id}}">{{$item->mulai}} - {{$item->sampai}}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Dinas</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{$jabatan->skpd->nama}}" readonly class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                      <div class="col-sm-10">
                        <input type="text" value="{{$jabatan->nama}}" readonly class="form-control">
                        <input type="hidden" value="{{$jabatan->id}}" name="jabatan_id" readonly class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kinerja Utama</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="kinerja_utama"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Indikator Kinerja Utama</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="indikator_kinerja_utama"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Penjelasan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="penjelasan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Sumber Data</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="sumber_data"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="penanggung_jawab"></textarea>
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