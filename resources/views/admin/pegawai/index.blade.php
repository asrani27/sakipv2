@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>Pegawai</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        <div class="box-header">
            <div class="title">
              <a href="/data/pegawai/add" class="btn btn-primary btn-sm"> 
                <i class='fa fa-plus'></i>Tambah Pegawai</a> 
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
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Unit Kerja</th>
                          <th>Eselon</th>
                          <th>Pangkat</th>
                          <th>Jabatan</th>
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
                            <td>{{$item->nip}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->skpd == null ? '-' : $item->skpd->nama}}</td>
                            <td>{{$item->eselon == null ? '-' : $item->eselon->nama}}</td>
                            <td>{{$item->pangkat == null ? '-' : $item->pangkat->nama}}</td>
                            <td>{{$item->jabatan == null ? '-' : $item->jabatan->nama}}</td>
                            <td>
                                <a href="/data/pegawai/edit/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                
                                <a href="/data/pegawai/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
              {{$data->links()}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush