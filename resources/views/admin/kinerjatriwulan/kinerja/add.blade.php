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
                <a class="btn btn-white" href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$kinerja_id}}"><i
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
                        Input Kinerja
                    </div>
                </div>
                <div class="box-content">
                    <form action="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/kinerja/{{$kinerja_id}}/add"
                        accept-charset="UTF-8" class="form" style="margin-bottom: 0;" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputText">Nama</label>
                            <input class="form-control" id="inputText" value="{{$jabatan->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Tahun & Triwulan</label>
                            <input class="form-control" id="inputText"
                                value="Th :{{$tahun_triwulan->tahun}}, Triwulan : {{$tahun_triwulan->triwulan}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Kinerja</label>
                            <input class="form-control" name="kinerja" placeholder="Kinerja" required>
                        </div>
                        <div class="form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg"
                            style="margin-bottom: 0;">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-floppy-o"></i>
                                SIMPAN
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