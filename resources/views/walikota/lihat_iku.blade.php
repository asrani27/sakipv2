@extends('admin.flatty')

@section('content') 
<div class='col-xs-12'>

  <div class='page-header page-header-with-buttons'>
      <h1 class='pull-left'>
          <i class='fa fa-tachometer'></i>
          <span>Indikator Kinerja Utama</span>
      </h1>
  </div>
    <div class='row'>
        <div class='col-sm-12'>
            <a href="/home" class="btn btn-sm btn-danger">Kembali</a> <br /><br />
            <div class='box bordered-box purple-border' style='margin-bottom:0;'>
                <div class='box-header purple-background'>
                    <div class='title'>Kepala {{$data->nama}}</div>
                    
                </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                            <table class='table table-hover table-striped'  style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                                <thead>
                                <tr>
                                    
                                <th>NO</th>
                                <th>PERIODE</th>
                                <th>KINERJA UTAMA</th>
                                <th>INDIKATOR KINERJA</th>
                                <th>PENJELASAN</th>
                                <th>SUMBER DATA</th>
                                <th>PENANGGUNG JAWAB</th>
                                </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($data->verifiku as $item)        
                                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                                        <td>{{$no++}}</td>
                                        <td>{{$item->periode->mulai}}-{{$item->periode->sampai}} </td>
                                        <td>{{$item->kinerja_utama}}</td>
                                        <td>{{$item->indikator_kinerja_utama}}</td>
                                        <td>{{$item->penjelasan}}</td>
                                        <td>{{$item->sumber_data}}</td>
                                        <td>{{$item->penanggung_jawab}}</td>
                                    </tr>
                                    
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    

@endpush