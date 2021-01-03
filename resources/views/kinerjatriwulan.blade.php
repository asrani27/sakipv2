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
                        <div class="col-sm-2">
                            <select name="periode" class="form-control form-control-sm" required>
                                <option value="">-Tahun-</option>
                                <option value="20162021">2020</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="skpd" class="form-control form-control-sm" required>
                                <option value="">-Satuan Kerja-</option>
                                <option value="diskominfotik">Diskominfotik</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="skpd" class="form-control form-control-sm" required>
                                <option value="">-Jabatan-</option>
                                <option value="diskominfotik">Kepala Dinas</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="skpd" class="form-control form-control-sm" required>
                                <option value="" selected>-Triwulan-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
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
            CAPAIAN KINERJA SKPD DI LINGKUNGAN PEMERINTAH KOTA BANJARMASIN TAHUN 2020 (TRIWULAN 1) <br />
            BERDASARKAN PERJANJIAN KINERJA TAHUN 2020 <br/>
            NAMA DINAS DAERAH KOTA BANJARMASIN<br/>
            </h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">No.</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">SASARAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">INDIKATOR KINERJA</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">SATUAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">TARGET</th>
                    <th class="text-center" colspan=4>TARGET TRIWULAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">REALISASI</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">% CAPAIAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">PROGRAM DAN<br/> KEGIATAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">INDIKATOR KINERJA PROGRAM (outcome)<br/> dan Kegiatan (output)</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">SATUAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">TARGET</th>
                    <th class="text-center" colspan=4>TARGET TRIWULAN</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">REALISASI</th>
                    <th class="text-center" rowspan=2 style="vertical-align: middle;">% CAPAIAN</th>
                </tr>
                <tr class="bg-gradient-primary" style="font-size:10px; font-family:Arial, Helvetica, sans-serif">
                    
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
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