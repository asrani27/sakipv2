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
        
        <div class="box-header">
          <div class="title">
            <a href="/pegawai/rencana-aksi/add" class="btn btn-primary btn-sm"> 
              <i class='fa fa-plus'></i>Tambah Rencana Aksi</a> 
          </div>
        </div>
        <div class="box-content ">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;width:100%;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          <th rowspan="2" class="text-center" style="vertical-align:middle;">NO</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">TAHUN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KINERJA UTAMA</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">INDIKATOR</th>
                          <th colspan="4" class="text-center" style="vertical-align:middle">TARGET KINERJA</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KINERJA Es. III</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">INDIKATOR</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">PROGRAM</th>
                          <th colspan="4" class="text-center" style="vertical-align:middle">TARGET KINERJA</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KINERJA Es. IV</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">INDIKATOR</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">KEGIATAN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">AKTIVITAS</th>
                          <th colspan="4" class="text-center" style="vertical-align:middle">TARGET KEUANGAN</th>
                          <th rowspan="2" class="text-center" style="vertical-align:middle">AKSI</th>
                        </tr>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <th>TW.I</th>
                            <th>TW.II</th>
                            <th>TW.III</th>
                            <th>TW.IV</th>
                            
                            <th>TW.I</th>
                            <th>TW.II</th>
                            <th>TW.III</th>
                            <th>TW.IV</th>

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
                          <tr>
                              
                          </tr>
                          @foreach ($data as $item) 
                            @if ($item != null)    
                              <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                                <td>{{$no++}}</td>
                                <td>{{$item->pk->tahun->tahun}}</td>
                                <td>{{$item->pk->kinerja_utama}}</td>
                                <td>
                                  <ul>
                                    @foreach ($item->pk->indikator as $indikatoresII)
                                        <li>
                                          {{$indikatoresII->indikator}}
                                        </li>
                                    @endforeach
                                  </ul>
                                
                                </td>
                                <td> 
                                  {{$item->tw1}}
                                </td>
                                <td> 
                                  {{$item->tw2}}
                                </td>
                                <td> 
                                  {{$item->tw3}}
                                </td>
                                <td> 
                                  {{$item->tw4}}
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr> 
                            @endif       
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
              {{-- {{$data->links()}} --}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush
