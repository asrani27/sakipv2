@extends('layouts.app')

@push('css')

@endpush

@section('contents')
<div class="row">
    <div class="col-lg-2">
        @include('layouts.menu')
    </div>

    <!-- /.col-md-6 -->
    <div class="col-lg-10">
        <div class="card">
        <div class="card-header bg-gradient-primary">
            <h5 class="card-title m-0">Login</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    </div>
                    <input type="text" id="target" class="form-control" name="username" placeholder="Username" required>
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-key"></i>
                    </span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Log In</button>
            </form>
        </div>
        </div>
    </div>
<!-- /.col-md-6 -->
</div>
@endsection

@push('js')
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $( "#target" ).change(function() {
            param = document.getElementById("target").value;
            axios.get('/cek-username/'+ param)
            .then(function (response) {
                if(response.data == 1){
                    document.getElementById("notif").innerHTML = 'Data Sudah Ada';
                }else{
                    document.getElementById("notif").innerHTML = 'Data Tidak Ada';
                }
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
            });
        });
    </script> --}}
@endpush