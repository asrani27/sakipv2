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
          <div class="col-sm-2">
            <div class="title">
                <a href="/pegawai/pk/add" class="btn btn-primary btn-sm"> 
                  <i class='fa fa-plus'></i> Buat PK</a> 
                  <a href="/pegawai/pk/update" class="btn btn-primary btn-sm"> 
                    <i class='fa fa-refresh'></i> Update PK</a> 
            </div>
          </div>
          
          <form method="GET" action="/pegawai/pk/tampilkan">
          <div class="col-sm-3">
            <select name="tahun_id" class="form-control">
              <option value="">-Semua-</option>
              @foreach ($tahun as $item)
                  <option value="{{$item->id}}" {{old('tahun_id') == $item->id ? 'selected':''}} {{$tahun_id == $item->id ? 'selected':''}}>Tahun: {{$item->tahun}} Periode: {{$item->periode->mulai}}-{{$item->periode->sampai}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3">
            <button type="submit" value="1" name="button" class="btn btn-warning"><i class='fa fa-eye'></i> Tampilkan</button>
            <button type="submit" formtarget="_blank" value="2" name="button" class="btn btn-info"><i class='fa fa-print'></i> Print</button>
          </div>
          </form>
          <div class="col-sm-3">
              <form method="GET" action="/pegawai/pk/search">
                <input class="form-control" name="search" placeholder="Search" type="text">
              </form>
          </div>
        </div>
        <div class="box-header">
          <div class="title">
            
            @if ($data == '0')    
              @foreach (tahun() as $item)  
              <a href="/pegawai/rencana-aksi/{{$item->id}}" class="btn btn-sm btn-success">{{$item->tahun}}</a> 
              @endforeach
            @else
              @foreach (tahun() as $item)  
                <a href="/pegawai/rencana-aksi/{{$item->id}}" class="btn btn-sm {{$item->id == $tahun_id ? 'btn-info': 'btn-success'}}">{{$item->tahun}}</a> 
              @endforeach
            @endif
          </div>
        </div>
        
        @if ($data == '0')
            
        @else
          <div class="box-content ">
            <div class="responsive-table">
                <div class="scrollable-area">
                  <a href="/pegawai/rencana-aksi/{{$tahun_id}}/pdf" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                    <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;width:100%;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          {{-- <th rowspan="2" class="text-center" style="vertical-align:middle">TAHUN</th> --}}
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
                            
                            @foreach ($data as $item)  
                            
                            @php
                            $itemEs2Line = true;
                            @endphp          
                                @foreach ($item['indikator_ikues2'] as $item2)     
                                @php
                                $itemEs2indikatorLine = true;
                                @endphp                                              
                                    @foreach ($item2['kinerjaEs3'] as $item3)   
                                    
                                    @php
                                    $itemEs3Line = true;
                                    @endphp                                                  
                                        @foreach ($item3['indikator_ikues3'] as $item4)      
                                    
                                        <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">                                            
                                            {{-- <td>{{$tahun}}</td> --}}
                                            @if($itemEs2Line)
                                            <td rowspan="{{$item['rowspan_ikues2']}}">{{$item['ikues2']}}</td>
                                            @php
                                                $itemEs2Line = false;
                                            @endphp
                                            @endif

                                            @if($itemEs2indikatorLine)
                                            <td rowspan="{{$item2['rowspan_indikator_ikues2']}}">{{$item2['indikator_ikues2']}}</td>
                                            <td rowspan="{{$item2['rowspan_indikator_ikues2']}}">
                                              @if ($item2['indikator_ikues2'] != null)  
                                              {{$item2['tw1_ikues2']}}                                        
                                              <a href="/pegawai/rencana-aksi/tw1/{{$item2['id_indikator_ikues2']}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                              @else               
                                              @endif
                                            </td>
                                            <td rowspan="{{$item2['rowspan_indikator_ikues2']}}">
                                              @if ($item2['indikator_ikues2'] != null)  
                                              {{$item2['tw2_ikues2']}}                                        
                                              <a href="/pegawai/rencana-aksi/tw2/{{$item2['id_indikator_ikues2']}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                              @else               
                                              @endif
                                            </td>
                                            
                                            <td rowspan="{{$item2['rowspan_indikator_ikues2']}}">
                                              @if ($item2['indikator_ikues2'] != null)  
                                              {{$item2['tw3_ikues2']}}                                        
                                              <a href="/pegawai/rencana-aksi/tw3/{{$item2['id_indikator_ikues2']}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                              @else               
                                              @endif
                                            </td>
                                            
                                            <td rowspan="{{$item2['rowspan_indikator_ikues2']}}">
                                              @if ($item2['indikator_ikues2'] != null)  
                                              {{$item2['tw4_ikues2']}}                                        
                                              <a href="/pegawai/rencana-aksi/tw4/{{$item2['id_indikator_ikues2']}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target"><i class="fa fa-edit"></i></a>
                                              @else               
                                              @endif
                                            </td>
                                            
                                            @php
                                                $itemEs2indikatorLine = false;
                                            @endphp
                                            @endif
                                            
                                            
                                            @if($itemEs3Line)
                                            <td rowspan="{{$item3['count_indikator_ikues3']}}">{{$item3['ikues3']}}</td>
                                            @php
                                                $itemEs3Line = false;
                                            @endphp
                                            @endif
                                            {{-- <td>{{$item3['ikues3']}}</td> --}}
                                            <td>{{$item4['indikator_ikues3']}}</td>
                                            <td></td>
                                            
                                            
                                            <td>{{$item4['tw1_ikues3']}}</td>
                                            <td>{{$item4['tw2_ikues3']}}</td>
                                            <td>{{$item4['tw3_ikues3']}}</td>
                                            <td>{{$item4['tw4_ikues3']}}</td>
                                            
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
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                          {{-- @foreach ($data as $sasaran) 
                            @php
                                $sasaranLine = true;
                            @endphp
                            @foreach ($sasaran->indikator as $indikatorsasaran)
                            <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                                <td>{{$no++}}</td>
                                <td>{{$tahun}}</td>
                                <td>{{$sasaran->kinerja_utama}}</td>
                                <td>{{$indikatorsasaran->indikator}}</td>
                                @foreach ($indikatorsasaran->target->where('tahun_id', $tahun_id) as $targetsasaran)
                                <td>{{$targetsasaran->tw1}}</td>
                                <td>{{$targetsasaran->tw2}}</td>
                                <td>{{$targetsasaran->tw3}}</td>
                                <td>{{$targetsasaran->tw4}}</td>
                                @endforeach
                                @foreach ($indikatorsasaran->kinerjautamaeselon3 as $kinerjaes3)
                                <td>{{$kinerjaes3->kinerja_utama}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                          @endforeach --}}
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
              {{-- {{$data->links()}} --}}
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
