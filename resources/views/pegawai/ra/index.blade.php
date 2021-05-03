@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Rencana Aksi</span>
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
          <form method="GET" action="/pegawai/rencana-aksi/tampilkan">
          <div class="col-sm-3">
            <select name="tahun_id" class="form-control">
              <option value="">-Semua-</option>
              @foreach ($tahun as $item)
                  <option value="{{$item->id}}" {{old('tahun_id') == $item->id ? 'selected':''}} {{$tahun_id == $item->id ? 'selected':''}}>Tahun: {{$item->tahun}} Periode: {{$item->periode->mulai}}-{{$item->periode->sampai}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-4">
            <button type="submit" value="1" name="button" class="btn btn-warning"><i class='fa fa-eye'></i> Tampilkan</button>
            <button type="submit" formtarget="_blank" value="2" name="button" class="btn btn-info"><i class='fa fa-print'></i> Print</button>
          </div>
          </form>
          <div class="col-sm-3">
              <form method="GET" action="/pegawai/rencana-aksi/search">
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
                          @if (Auth::user()->pegawai->jabatan->tingkat == 2)
                          <th rowspan="2" class="text-center" style="vertical-align:middle">PROGRAM</th>
                              
                          @elseif(Auth::user()->pegawai->jabatan->tingkat == 3)
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KEGIATAN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">AKTIVITAS</th>
                              
                          @endif
                          <th colspan="4" class="text-center" style="vertical-align:middle">TARGET KINERJA</th>
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
                            @foreach ($data as $key => $item)
                                <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                                    <td style="text-align:center;">{{$data->firstItem() + $key}}</td>
                                    <td style="text-align:center;">{{$item->tahun->tahun}}</td>
                                    <td>{{$item->indikator_iku->iku->kinerja_utama}}</td>
                                    <td>{{$item->indikator_iku->indikator}}</td>
                                    @if (Auth::user()->pegawai->jabatan->tingkat == 2)
                                    <td>
                                      {{$item->indikator_iku->program}}
                                    
                                      <a href="/pegawai/rencana-aksi/program/{{$item->indikator_iku->id}}/{{$tahun_edit == null ? '':$tahun_edit->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Nama Program"><i class="fa fa-edit"></i></a>
                                    </td>
                                    @elseif(Auth::user()->pegawai->jabatan->tingkat == 3)
                                    <td></td>
                                    <td></td>
                                        
                                    @else

                                    <td style="text-align:center;">
                                      {{$item->tw1 == null ? '-' : $item->tw1}}
                                      <a href="/pegawai/rencana-aksi/tw1/{{$item->id}}/{{$tahun_edit == null ? '':$tahun_edit->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td style="text-align:center;">
                                      {{$item->tw2 == null ? '-' : $item->tw2}}
                                      <a href="/pegawai/rencana-aksi/tw2/{{$item->id}}/{{$tahun_edit == null ? '':$tahun_edit->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td style="text-align:center;">
                                      {{$item->tw3 == null ? '-' : $item->tw3}}
                                      <a href="/pegawai/rencana-aksi/tw3/{{$item->id}}/{{$tahun_edit == null ? '':$tahun_edit->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td style="text-align:center;">
                                      {{$item->tw4 == null ? '-' : $item->tw4}}
                                      <a href="/pegawai/rencana-aksi/tw4/{{$item->id}}/{{$tahun_edit == null ? '':$tahun_edit->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                    </td>
                                    @endif
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
