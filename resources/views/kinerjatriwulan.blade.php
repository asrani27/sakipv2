@extends('layouts.app2')

@push('css')

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="GET" action="/kinerja-triwulan/search">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="tahun" class="form-control form-control-sm" required>
                                <option value="">-Tahun-</option>
                                @foreach (tahun() as $item)
                                <option value="{{$item->tahun}}">{{$item->tahun}}</option>
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
                            <select name="triwulan" class="form-control form-control-sm" required>
                                <option value="" selected>-Triwulan-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i>
                                Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if (count($data) != 0)
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 style="font-size:18px" class="text-center">
                    CAPAIAN KINERJA SKPD DI LINGKUNGAN PEMERINTAH KOTA BANJARMASIN TAHUN : {{$tahun}}, TRIWULAN
                    {{$triwulan}}<br />
                    @if ($jb == null)

                    @else
                    {{strtoupper($jb->nama)}} <br />
                    {{strtoupper($jb->skpd->nama)}} <br />
                    @endif
                    KOTA BANJARMASIN<br />
                </h4>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="bg-gradient-primary"
                            style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                            {{-- <th class="text-center" rowspan=2 style="vertical-align: middle;">No.</th> --}}
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">KINERJA UTAMA</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">INDIKATOR & CAPAIAN</th>
                            {{-- <th class="text-center" rowspan=2 style="vertical-align: middle;">SATUAN</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">TARGET</th>
                            <th class="text-center" colspan=4>TARGET TRIWULAN</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">REALISASI</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">% CAPAIAN</th> --}}
                            {{-- <th class="text-center" rowspan=2 style="vertical-align: middle;">PROGRAM DAN<br />
                                KEGIATAN
                            </th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">INDIKATOR KINERJA PROGRAM
                                (outcome)<br /> dan Kegiatan (output)</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">SATUAN</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">TARGET</th>
                            <th class="text-center" colspan=4>TARGET TRIWULAN</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">REALISASI</th>
                            <th class="text-center" rowspan=2 style="vertical-align: middle;">% CAPAIAN</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->first()->kinerja as $item)
                        <tr>
                            <td>{{$item->isi}}</td>

                            <td>
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="bg-gradient-primary"
                                            style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                                            <th class="text-center" rowspan=2 style="vertical-align: middle;">INDIKATOR
                                                KINERJA</th>
                                            <th class="text-center" rowspan=2 style="vertical-align: middle;">SATUAN
                                            </th>
                                            <th class="text-center" rowspan=2 style="vertical-align: middle;">TARGET
                                            </th>
                                            <th class="text-center">TW.I</th>
                                            <th class="text-center">TW.II</th>
                                            <th class="text-center">TW.III</th>
                                            <th class="text-center">TW.IV</th>
                                            <th class="text-center" rowspan=2 style="vertical-align: middle;">REALISASI
                                            </th>
                                            <th class="text-center" rowspan=2 style="vertical-align: middle;">CAPAIAN %
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->indikator as $ind)
                                        <tr>
                                            <td>{{$ind->indikator}}</td>
                                            <td>{{$ind->satuan}}</td>
                                            <td>{{$ind->target}}</td>
                                            <td>{{$ind->tw1}}</td>
                                            <td>{{$ind->tw2}}</td>
                                            <td>{{$ind->tw3}}</td>
                                            <td>{{$ind->tw4}}</td>
                                            <td>{{$ind->realisasi}}</td>
                                            <td>{{$ind->capaian}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
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