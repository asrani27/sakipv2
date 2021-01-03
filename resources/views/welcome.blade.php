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
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-gradient-green">10 Feb. 2014</span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                    <h3 class="timeline-header">Artikel Informasi</h3>
  
                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-sm">Selengkapnya..</a>
                    </div>
                  </div>
                </div>
                <div>
                  <i class="fas fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                    <h3 class="timeline-header">Artikel Informasi</h3>
  
                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-sm">Selengkapnya..</a>
                    </div>
                  </div>
                </div>
                <div>
                  <i class="fas fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                    <h3 class="timeline-header">Artikel Informasi</h3>
  
                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-sm">Selengkapnya..</a>
                    </div>
                  </div>
                </div>
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