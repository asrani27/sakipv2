@extends('admin.flatty')
@push('css')

@endpush

@section('content')
<div class="col-xs-12">
    <div class='page-header page-header-with-buttons'>
        <h1 class='pull-left'>
            <i class='fa fa-user'></i>
            <span>Kinerja Triwulan</span>
        </h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="box bordered-box green-border" style="margin-bottom:0;">
                <div class="box-content box-no-padding">
                    <div class="responsive-table">
                        <div class="scrollable-area">
                            <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;">
                                <thead>
                                    <tr class="blue-background" style="color: white">
                                        <th>No</th>
                                        <th>Struktur Organisasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @php
                                $no =1;
                                @endphp
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>
                                            <a href="/admin_skpd/kinerjatriwulan/struktur/{{$item->id}}"
                                                class="btn btn-xs btn-success"><i class="fa fa-list"></i> Kinerja</a>
                                        </td>
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