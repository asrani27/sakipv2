@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Program</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        
        <div class="alert alert-success alert-dismissable">
          <h4>
              <i class="fa fa-user"></i>
              Biodata
          </h4>
          <table>
            <tr>
              <td>NIP</td>
              <td>: {{biodata()['nip']}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>: {{biodata()['nama']}}</td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>: {{biodata()['jabatan']}}</td>
            </tr>
            <tr>
              <td>SKPD</td>
              <td>: {{biodata()['skpd']}}</td>
            </tr>
          </table>
        </div>
        
        <div class="row">          
          <div class="col-sm-1">
              <a href="/pegawai/program/add" class="btn btn-primary btn-sm"><i class='fa fa-plus'></i> Tambah</a>
          </div>
          <form method="GET" action="/pegawai/program/tampilkan">
          <div class="col-sm-3">
            <select name="tahun_id" class="form-control">
              <option value="">-Semua-</option>
              @foreach ($tahun as $item)
                  <option value="{{$item->id}}" {{old('tahun_id') == $item->id ? 'selected':''}} {{$tahun_id == $item->id ? 'selected':''}}>Tahun: {{$item->tahun}} Periode: {{$item->periode->mulai}}-{{$item->periode->sampai}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-5">
            <button type="submit" value="1" name="button" class="btn btn-warning"><i class='fa fa-eye'></i> Tampilkan</button>
            <button type="submit" value="2" name="button" class="btn btn-info" formtarget="_blank" ><i class='fa fa-print'></i> Rencana Aksi</button>
            
          </div>
          </form>
          <div class="col-sm-3">
              <form method="GET" action="/pegawai/program/search">
                <input class="form-control" name="search" placeholder="Search" type="text">
              </form>
          </div>
        </div>
        
        
        @if ($data == '0')
            
        @else
          <div class="box-content ">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;width:100%;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          <th rowspan="2" class="text-center" style="vertical-align:middle">#</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">TAHUN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KINERJA UTAMA</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">INDIKATOR</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">PROGRAM</th>
                          <th colspan="4" class="text-center" style="vertical-align:middle">TARGET TRIWULAN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">AKSI</th>
                        </tr>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <th>TW.I</th>
                            <th>TW.II</th>
                            <th>TW.III</th>
                            <th>TW.IV</th>
                        </tr>
                        </thead>
                        @php
                          $no =1;
                        @endphp
                        <tbody>
                            @foreach ($data as $item)
                                <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                                  <td>{{$no++}}</td>
                                  <td>{{$item->tahun->tahun}}</td>
                                  <td>{{$item->indikator_iku3->iku3->kinerja_utama}}</td>
                                  <td>{{$item->indikator_iku3->indikator}}</td>
                                  <td>{{$item->nama}}</td>
                                  <td>{{$item->tw1}}</td>
                                  <td>{{$item->tw2}}</td>
                                  <td>{{$item->tw3}}</td>
                                  <td>{{$item->tw4}}</td>
                                  <td>
                                    <a href="/pegawai/program/edit/{{$item->id}}" class="btn btn-xs btn-success">Edit</a> |
                                    <a href="/pegawai/program/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin ingin di hapus?');">Hapus</a>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        @endif
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
              {{$data->links()}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script>
  $(document).on('click', '.rencana-aksi', function() {
    $('#modal-default').modal('show');
  });
</script>
@endpush
