@extends('admin.flatty')

@push('css') 

@endpush

@section('content')
<div class="col-xs-12">
  
    <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-user'></i>
          <span>Tambah IKU</span>
      </h1>
    </div>
    
    <div class="row">
      <div class="col-sm-12">
          <div class="box bordered-box green-border" style="margin-bottom:0;">
              <div class="box-header">
                  <div class="title">
                    <a href="/admin_skpd/pegawai/iku/{{$pegawai->id}}" class="btn btn-info btn-sm"> 
                      <i class='fa fa-arrow-left'></i> Kembali</a> 
                  </div>
                  <div class="actions">
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                  </div>
              </div>
              <div class="box-content">
                  <form action="/admin_skpd/pegawai/iku/{{$pegawai->id}}/add" accept-charset="UTF-8" class="form form-horizontal" style="margin-bottom: 0;" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Tahun</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="tahun_id" class="form-control" required>
                          <option value="">-Pilih-</option>
                          @foreach ($tahun as $item)
                              <option value="{{$item->id}}">Tahun: {{$item->tahun}}, Periode:{{$item->periode->mulai}}/{{$item->periode->sampai}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">SKPD</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" value="{{$jabatan->skpd->nama}}" readonly class="form-control">
                      </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Jabatan</label>
                      <div class="col-xs-5 col-md-10">
                        <input type="text" value="Kepala {{$jabatan->nama}}" readonly class="form-control">
                        <input type="hidden" value="{{$jabatan->id}}" name="jabatan_id" readonly class="form-control">
                      </div>
                    </div> 
                    @if ($jabatan->tingkat == '2')
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">IKU Atasan</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="indikator_iku_id" class="form-control" required>
                            <option value="">-Pilih-</option>
                            @foreach ($indikator_iku_atasan as $item)
                            <option value="{{$item->id}}">{{$item->iku2->periode->mulai}}/{{$item->iku2->periode->sampai}} - {{$item->indikator}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div> 
                    @elseif($jabatan->tingkat == '3')
                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Program Atasan</label>
                      <div class="col-xs-5 col-md-10">
                        <select name="indikator_iku_id" class="form-control" required>
                            <option value="">-Pilih-</option>
                            @foreach ($indikator_iku_atasan as $item)
                            <option value="{{$item->id}}">{{$item->tahun->tahun}} - {{$item->nama}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>                         
                    @endif

                    <div class="form-group">
                      <label class="control-label col-sm-2 col-xs-12">Kinerja Utama</label>
                      <div class="col-xs-5 col-md-10">
                        <textarea class="form-control" name="kinerja_utama"></textarea>
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