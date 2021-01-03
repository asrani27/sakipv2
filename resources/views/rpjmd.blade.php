@extends('layouts.app2')

@push('css')

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="GET" action="/rpjmd/search">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <select name="periode" class="form-control form-control-sm" required>
                                <option value="">-Periode-</option>
                                <option value="20162021">2016-2021</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($data != null)
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body table-responsive">
            <h4 style="font-size:18px" class="text-center">
            SASARAN PEMBANGUNAN <br />
            PERIODE {{$periode}} <br/>
            PEMERINTAH KOTA BANJARMASIN
            </h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <th class="text-center">TUJUAN</th>
                    <th class="text-center">SASARAN</th>
                    <th class="text-center">INDIKATOR</th>
                    <th class="text-center">KONDISI AWAL</th>
                    <th class="text-center">2016</th>
                    <th class="text-center">2017</th>
                    <th class="text-center">2018</th>
                    <th class="text-center">2019</th>
                    <th class="text-center">2020</th>
                    <th class="text-center">KONDISI AKHIR</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gradient-warning" style="font-size:10px; font-weight:bold; font-family:Arial, Helvetica, sans-serif">
                    <td colspan='10' class="visi">{{$data['visi']}}</td>
                </tr>
                @foreach ($data['misi'] as $item)
                <tr class="bg-gradient-info" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <td colspan='10' class="misi">{{$item['kodemisi']}}. {{$item['uraimisi']}}</td>
                </tr>
                    @foreach ($item['tujuan'] as $item2)
                    @php
                        $tujuanLine = true;
                    @endphp
                        @foreach ($item2['sasaran'] as $item3)
                        @php
                            $uraianLine = true;
                        @endphp
                            @foreach ($item3['indikator'] as $item4)
                            <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                                @if($tujuanLine)
                                <td class="tujuan" rowspan="{{$item2['sasaranRows']}}">{{$item2['uraitujuan']}}</td>
                                @php
                                    $tujuanLine = false;
                                @endphp
                                @endif
                                
                                @if($uraianLine)
                                <td class="uraian" rowspan="{{count($item3['indikator'])}}">{{$item3['uraisasaran']}} </td>
                                @php
                                    $uraianLine = false;
                                @endphp
                                @endif
                                <td>{{$item4['urai']}}</td> 
                                <td>{{$item4['target_n1']}}</td> 
                                <td>{{$item4['target_n2']}}</td>
                                <td>{{$item4['target_n3']}}</td>
                                <td>{{$item4['target_n4']}}</td>
                                <td>{{$item4['target_n5']}}</td>
                                <td>{{$item4['target_n6']}}</td>
                                <td>{{$item4['target_n7']}}</td>
                            </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
@endif

@endsection

@push('js')
    
@endpush