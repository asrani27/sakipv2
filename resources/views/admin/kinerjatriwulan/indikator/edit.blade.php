@extends('admin.flatty')
@push('css')

@endpush

@section('content')
<div class="col-xs-12">
    <div class='page-header page-header-with-buttons'>
        <h1 class='pull-left'>
            <i class='fa fa-user'></i>
            <span>Kinerja Triwulan {{Str::limit($jabatan->nama, 40, '...')}}</span>
        </h1>
        <div class="pull-right">
            <div class="btn-group">
                <a class="btn btn-white"
                    href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$indikator->kinerja_triwulan_id}}"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header red-background">
                    <div class="title">
                        <div class="fa fa-pencil-square-o"></div>
                        Edit Indikator Kinerja
                    </div>
                </div>
                <div class="box-content">
                    <form action="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/indikator/{{$indikator_id}}/edit"
                        accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputText">Nama</label>
                            <input class="form-control" id="inputText" value="{{$jabatan->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Tahun & Triwulan</label>
                            <input class="form-control" id="inputText"
                                value="Th :{{$indikator->triwulan->tahun}}, Triwulan : {{$indikator->triwulan->triwulan}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Kinerja</label>
                            <input class="form-control" name="kinerja" value="{{$indikator->kinerja->isi}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Indikator</label>
                            <input class="form-control" name="indikator" required value="{{$indikator->indikator}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">Satuan</label>
                            <input class="form-control" name="satuan" required value="{{$indikator->satuan}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">Target</label>
                            <input class="form-control" name="target" required value="{{$indikator->target}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">TW.I</label>
                            <input class="form-control" name="tw1" required value="{{$indikator->tw1}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">TW.II</label>
                            <input class="form-control" name="tw2" required value="{{$indikator->tw2}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">TW.III</label>
                            <input class="form-control" name="tw3" required value="{{$indikator->tw3}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">TW.IV</label>
                            <input class="form-control" name="tw4" required value="{{$indikator->tw4}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">Realisasi</label>
                            <input class="form-control" name="realisasi" required value="{{$indikator->realisasi}}">
                        </div>
                        <div class="form-group">
                            <label for="inputText">Capaian</label>
                            <input class="form-control" name="capaian" required value="{{$indikator->capaian}}">
                        </div>
                        <div class="form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg"
                            style="margin-bottom: 0;">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-floppy-o"></i>
                                UPDATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush