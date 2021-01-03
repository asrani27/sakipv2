@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-sitemap'></i>
        <span>SKPD</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="box bordered-box green-border" style="margin-bottom:0;">
            <div class="box-header">
                <div class="title">
                  <a href="/data/skpd/add" class="btn btn-primary btn-sm"> 
                    <i class='fa fa-plus'></i>Tambah SKPD</a> 
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
                              <th class="text-center">No</th>
                              <th class="text-center">Kode</th>
                              <th>Nama</th>
                              <th>Username For Login</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            @php
                              $no =1;
                            @endphp
                            <tbody>
                              @foreach ($data as $item)        
                              <tr>
                                  <td class="text-center">{{$no++}}</td>
                                  <td class="text-center">{{$item->kode_skpd}}</td>
                                  <td>{{$item->nama}}</td>
                                  <td>
                                    @if ($item->user == null)
                                    <a href="/data/skpd/buatuser/{{$item->id}}" class="btn btn-xs btn-info">Buat Akun Admin SKPD</a>
                                    @else
                                    {{$item->user->username}}
                                    <a href="/data/skpd/resetpass/{{$item->id}}" class="btn btn-xs btn-warning">Reset Pass</a>
                  
                                    @endif
                                  </td>
                                  <td class="text-center">
                                      <a href="/data/skpd/edit/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                      
                                      <a href="/data/skpd/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>
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
