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
                <a class="btn btn-white" href="/admin_skpd/kinerjatriwulan/struktur/{{$id}}"><i
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
                        Input Tahun Dan Triwulan
                    </div>
                </div>
                <div class="box-content">
                    <form action="/admin_skpd/kinerjatriwulan/struktur/{{$id}}/tahun/add" accept-charset="UTF-8"
                        class="form" style="margin-bottom: 0;" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputText">Nama</label>
                            <input class="form-control" id="inputText" value="{{$jabatan->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Tahun</label>
                            <input class="form-control" type="text" name="tahun" placeholder="2021" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Triwulan</label>
                            <select name="triwulan" class="form-control" required>
                                <option value="">-pilih-</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                            </select>
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