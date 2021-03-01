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
        
        <div class="alert alert-success alert-dismissable">
          <h4>
              <i class="fa fa-user"></i>
              Biodata
          </h4>
          <table>
            <tr>
              <td>NIP</td>
              <td>: {{biodata()['nip']}}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>: {{biodata()['nama']}}</td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>: {{biodata()['jabatan']}}</td>
            </tr>
            <tr>
              <td>SKPD</td>
              <td>: {{biodata()['skpd']}}</td>
            </tr>
          </table>
        </div>
        
        <div class="row">
          <div class="col-sm-6">
            <div class="title">
                <a href="/pegawai/pk/add" class="btn btn-primary btn-sm"> 
                  <i class='fa fa-plus'></i> Buat PK Periode 
                  {{periodeAktif()->mulai}} - {{periodeAktif()->sampai}} </a> 
            </div>
          </div>
          <div class="col-sm-3">
          </div>
          <div class="col-sm-3">
              <form method="GET" action="/pegawai/pk/search">
                <input class="form-control" name="search" placeholder="Search" type="text">
              </form>
          </div>
        </div>
        
        <div class="row" style="padding-top:4px;padding-bottom:5px;">
          <div class="col-sm-12">
            @foreach (tahun() as $item)  
              <a href="/pegawai/pk/tahun/{{$item->id}}" class="btn btn-success btn-sm">{{$item->tahun}}</a> 
            @endforeach
          </div>
        </div>
        <div class="box-content box-no-padding">
            <div class="responsive-table">
                <div class="scrollable-area">
                    <table class="table table-bordered table-hover table-striped responsive-table" style="margin-bottom:0;">
                        <thead>
                        <tr class="blue-background" style="color: white; font-size:10px; font-family:Arial, Helvetica, sans-serif">
                          {{-- <th>NO</th> --}}
                          <th>TAHUN</th>
                          <th>KINERJA UTAMA</th>
                          <th>INDIKATOR KINERJA</th>
                          <th>TARGET</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                          @foreach ($data->sortBy('tahun_id') as $key => $item)        
                          <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                              {{-- <td>{{$key + $data->firstItem()}}</td> --}}
                              <td>{{$item->tahun->tahun}}</td>
                              <td>{{$item->indikator_iku->iku->kinerja_utama}}</td>
                              <td>{{$item->indikator_iku->indikator}}</td>
                              <td>
                                  @if ($item->target == null)
                                    <a href="/pegawai/pk/target/{{$item->id}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Isi Target</a>
                                      
                                  @else
                                  {{$item->target}}
                                  <a href="/pegawai/pk/target/edit/{{$item->id}}" class="has-tooltip" data-placement="right" title="" data-original-title="Edit Target" ><i class="fa fa-edit"></i></a>
                                      
                                  @endif
                              </td>
                          </tr> 
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
        {{$data->links()}}
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
