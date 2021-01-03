@extends('admin.app')
@push('css')

@endpush
@section('title')
  <h3>Jabatan</h3>
@endsection

@section('content') 
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Jabatan : {{$data == null ? '-' : $data->nama}}</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Tugas</th>
            <th>Fungsi</th>
            <th></th>
        </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @if ($data != null)
            <tr>
                <td>{{$no++}}</td>
                <td>
                    @if (count($data->tugas) != 0)
                        <ul>
                        @foreach ($data->tugas as $tugas)
                            <li>{{$tugas->isi}}</li>
                        @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if (count($data->fungsi) != 0)
                        <ul>
                        @foreach ($data->fungsi as $fungsi)
                            <li>{{$fungsi->isi}}</li>
                        @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                        <a href="/pegawai/tugas/add/{{$data->id}}" class="btn btn-xs btn-success">Tugas</a>
                        <a href="/pegawai/fungsi/add/{{$data->id}}" class="btn btn-xs btn-success">Fungsi</a>     
                </td>
            </tr>
            @endif
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')

@endpush