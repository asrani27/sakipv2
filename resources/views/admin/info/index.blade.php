@extends('admin.flatty')
@push('css')

@endpush
@section('title')
  <h3>PENGUMUMAN</h3>
@endsection

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-bullhorn'></i>
        <span>Pengumuman</span>
    </h1>
  </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="/info/add" class="btn btn-sm btn-primary"><i class='fa fa-plus'></i> Tambah</a>
                </div>
                <div class="actions">
                    <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                    </a>
                </div>
            </div>
            <div class="box-content box-no-padding">
                <div class="responsive-table">
                    <div class="scrollable-area">
                        <table class="table table-bordered table-hover table-striped" style="margin-bottom:0;">
                            <thead>
                            <tr class="blue-background" style="color: white">
                              <th>No</th>
                              <th>Judul</th>
                              <th>Isi</th>
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
                                    <td>{{$item->judul}}</td>
                                    <td>{!!$item->isi!!}</td>
                                    <td>
                                        <a href="/info/edit/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="/info/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Pengumuman ini?');"><i class="fa fa-trash"></i></a>
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