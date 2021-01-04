@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='fa fa-user'></i>
        <span>PK (Perjanjian Kinerja)</span>
    </h1>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
      <div class="box bordered-box green-border" style="margin-bottom:0;">
        
        <div class="box-header">
          <div class="title">
            <a href="/pegawai/pk/add" class="btn btn-primary btn-sm"> 
              <i class='fa fa-plus'></i>Tambah PK</a> 
          </div>
        </div>
        <div class="box-content box-no-padding">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped responsive-table" style="margin-bottom:0;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          <th>NO</th>
                          <th>TAHUN</th>
                          <th>KINERJA UTAMA</th>
                          <th>INDIKATOR KINERJA</th>
                          <th>TARGET</th>
                          <th></th>
                        </tr>
                        </thead>
                        @php
                          $no =1;
                        @endphp
                        <tbody>
                          
                          @foreach ($data as $item)        
                          <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                              <td>{{$no++}}</td>
                              <td>{{$item->tahun->tahun}}</td>
                              <td>{{$item->kinerja_utama}}</td>
                              <td>
                                  @if (count($item->indikator) == 0)
                                      -
                                  @else
                                     @foreach ($item->indikator as $indikator)
                                         {{$indikator->indikator}}
                                         <a href="/pegawai/pk/indikator/edit/{{$indikator->id}}"><i class="fa fa-edit"></i></a>
                                         <a href="/pegawai/pk/indikator/delete/{{$indikator->id}}" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a><br/>
                                     @endforeach 
                                  @endif    
                              </td>
                              <td>
                                  @if (count($item->indikator) == 0)
                                      -
                                  @else
                                     @foreach ($item->indikator as $indikator)
                                         {{$indikator->target}}<br/>
                                     @endforeach 
                                  @endif    
                              </td>
                          
                              <td>
                                      <a href="/pegawai/pk/indikator/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Indikator & Target</a>
                                      <a href="/pegawai/pk/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                      <a href="/pegawai/pk/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ini?');"><i class="fa fa-trash"></i></a>     
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
              {{-- {{$data->links()}} --}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

@endpush
