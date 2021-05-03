@extends('layouts.app3')

@push('css')

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="GET" action="/perjanjian-kinerja/search">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <select name="tahun_id" class="form-control form-control-sm" required>
                                <option value="">-Tahun-</option>
                                @foreach (tahun() as $item)
                                    <option value="{{$item->id}}">{{$item->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="skpd_id" class="form-control form-control-sm unit-kerja" required>
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
            LAMPIRAN PERJANJIAN KINERJA TAHUN {{$tahun->tahun}}<br />
            {{strtoupper($jabatan->nama)}} <br/>
            {{strtoupper($jabatan->skpd->nama)}} <br/>
            PEMERINTAH KOTA BANJARMASIN
            </h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <th class="text-center">KINERJA UTAMA</th>
                    <th class="text-center">INDIKATOR KINERJA UTAMA</th>
                    <th class="text-center">TARGET</th>
                </tr>
            </thead>
            <tbody>
                @if ($jabatan->tingkat ==1)
                @foreach ($data as $item)
                    @foreach ($item->indikator2 as $item2)
                        <tr  style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <td>{{$item2->iku2->kinerja_utama}}</td>
                            <td>{{$item2->indikator}}</td>
                            <td>{{$item2->target}}</td>
                        </tr>
                    @endforeach
                @endforeach
                @elseif ($jabatan->tingkat ==2)
                @foreach ($data as $item)
                    @foreach ($item->indikator3 as $item2)
                        <tr  style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <td>{{$item2->iku3->kinerja_utama}}</td>
                            <td>{{$item2->indikator}}</td>
                            <td>{{$item2->target}}</td>
                        </tr>
                    @endforeach
                @endforeach
                @elseif ($jabatan->tingkat ==3)
                @foreach ($data as $item)
                    @foreach ($item->indikator4 as $item2)
                        <tr  style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <td>{{$item2->iku4->kinerja_utama}}</td>
                            <td>{{$item2->indikator}}</td>
                            <td>{{$item2->target}}</td>
                        </tr>
                    @endforeach
                @endforeach
                @endif
            </tbody>
        </table>
        <br/>
        
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-sm" width="50px">
                    <thead>
                        <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            <th class="text-center" width="100px">PROGRAM</th>
                            <th class="text-center" width="100px">ANGGARAN</th>
                            <th class="text-center" width="100px">KET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

            </div>
        </div>
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
                console.log(response);
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