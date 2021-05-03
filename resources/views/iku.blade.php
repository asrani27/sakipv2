@extends('layouts.app2')

@push('css')

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="GET" action="/iku/search">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <select name="periode_id" class="form-control form-control-sm" required>
                                <option value="">-Periode-</option>
                                @foreach (periode() as $item)
                                    <option value="{{$item->id}}">{{$item->mulai}} - {{$item->sampai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="skpd_id" id="skpd_id" class="form-control form-control-sm unit-kerja" required>
                                <option value="">-Satuan Kerja-</option>
                                @foreach (skpd() as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="jabatan_id" id="jabatan_id" class="form-control form-control-sm" required>
                                <option value="">-Jabatan-</option>
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
            INDIKATOR KINERJA UTAMA <br />
            {{strtoupper($jabatan->nama)}} <br/>
            {{strtoupper($jabatan->skpd->nama)}} <br/>
            PERIODE {{$periode->mulai}} - {{$periode->sampai}}<br/>
            PEMERINTAH KOTA BANJARMASIN
            </h4>
            <table class="table table-bordered table-sm">
                <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <td width="10px">INSTANSI</td><td width="3px">:</td><td>{{$jabatan->skpd->nama}}</td>
                </tr>
                <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <td>TUGAS</td><td>:</td><td>
                        @foreach ($jabatan->tugas as $item)
                            {{$item->isi}}<br/>
                        @endforeach
                    </td>
                </tr>
                <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <td>FUNGSI</td><td>:</td><td>
                        @foreach ($jabatan->fungsi as $item)
                            {{$item->isi}}<br/>
                        @endforeach
                    </td>
                </tr>
            </table><br />
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <th class="text-center">KINERJA UTAMA</th>
                    <th class="text-center">INDIKATOR KINERJA UTAMA</th>
                    <th class="text-center">PENJELASAN</th>
                    <th class="text-center">SUMBER DATA</th>
                    <th class="text-center">PENANGGUNG JAWAB</th>
                </tr>
            </thead>
            <tbody>
                @if ($jabatan->tingkat ==1)
                @foreach ($data as $item)
                    @foreach ($item->indikator2 as $item2)
                    <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                        <td>{{$item2->iku2->kinerja_utama}}</td>
                        <td>{{$item2->indikator}}</td>
                        <td>{{$item2->penjelasan}}</td>
                        <td>{{$item2->sumber_data}}</td>
                        <td>{{$item2->penanggung_jawab}}</td>
                    </tr>
                    @endforeach
                @endforeach
                @elseif($jabatan->tingkat ==2)

                @foreach ($data as $item)
                    @foreach ($item->indikator3 as $item2)
                    <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                        <td>{{$item2->iku3->kinerja_utama}}</td>
                        <td>{{$item2->indikator}}</td>
                        <td>{{$item2->penjelasan}}</td>
                        <td>{{$item2->sumber_data}}</td>
                        <td>{{$item2->penanggung_jawab}}</td>
                    </tr>
                    @endforeach
                @endforeach
                @elseif($jabatan->tingkat ==3)
                @foreach ($data as $item)
                    @foreach ($item->indikator4 as $item2)
                    <tr style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                        <td>{{$item2->iku4->kinerja_utama}}</td>
                        <td>{{$item2->indikator}}</td>
                        <td>{{$item2->penjelasan}}</td>
                        <td>{{$item2->sumber_data}}</td>
                        <td>{{$item2->penanggung_jawab}}</td>
                    </tr>
                    @endforeach
                @endforeach
                @endif
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
@endif

@endsection

@push('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
    $("select.unit-kerja").change(function(){
        var x = $(this).children("option:selected").val();
        axios.get('/iku/get_jabatan/' + x)
            .then(function (response) {
                $("#jabatan_id option").remove();
                $.each(response.data, function(key, value) {
                    
                    $('#jabatan_id')
                        .append($("<option></option>")
                        .attr("value",value.id)
                        .text(value.nama));
                });
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});
</script>
@endpush