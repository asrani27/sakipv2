@extends('layouts.app3')

@push('css')

<link rel="stylesheet" href="/assets/stylechart.css">

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form method="GET" action="/pohon-kinerja/search">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <select name="periode_id" class="form-control form-control-sm" required>
                                <option value="">-Periode-</option>
                                
                                @foreach (periode() as $item)
                                    <option value="{{$item->id}}">{{$item->mulai}} - {{$item->sampai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <select name="skpd_id" class="form-control form-control-sm" required>
                                <option value="">-Satuan Kerja-</option>
                                @foreach (skpd() as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if ($data != null)

<div class="row">
    <div class="col-lg-12">
        <div class="content">
            
      </div>
    </div>
</div>
@endif

@endsection

@push('js')
    
@endpush