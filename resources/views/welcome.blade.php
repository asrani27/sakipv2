@extends('layouts.app')

@push('css')

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-2">
        @include('layouts.menu')
    </div>
    <div class="col-lg-10">
        <div class="card">
        <div class="card-header bg-gradient-primary">
            <h5 class="card-title m-0">Informasi</h5>
        </div>
        <div class="card-body">
            <div class="timeline">
              @foreach (pengumuman() as $item)
                  
                <div class="time-label">
                  <span class="bg-gradient-green">{{Carbon\Carbon::parse($item->created_at)->format('d M Y')}}</span>
                </div>
                
                <div>
                  <i class="fas fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i>{{Carbon\Carbon::parse($item->created_at)->format('H:i')}}</span>
                    <h3 class="timeline-header"><strong>{{$item->judul}}</strong></h3>
  
                    <div class="timeline-body">
                      {!!$item->isi!!}
                    </div>

                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-sm">Selengkapnya..</a>
                    </div>
                  </div>
                </div>
              @endforeach
                <!-- timeline time label -->
                <!-- /.timeline-label -->
                <!-- timeline item -->
                
                <!-- END timeline item -->
                
                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    
@endpush