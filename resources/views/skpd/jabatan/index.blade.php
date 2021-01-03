@extends('admin.app')
@push('css')

@endpush
@section('title')
<h3>Jabatan {{$data->nama}}</h3>
@endsection

@section('content') 
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
        <tr>
            <th>Jabatan</th>
        </tr>
        </thead>
        <tbody>  
            <tr>
                <td>
                    @if (count($data->jabatan) == 0)
                    <a href="#" class="btn btn-xs btn-success add-jabatan" data-idskpd="{{$data->id}}"><i class="fas fa-plus"></i></a>
                    @else
                    <ul>
                        <li>{{$data->jabatan->first()->nama}}
                            <a href="#" class="btn btn-xs btn-success add-subjabatan" data-idjabatan="{{$data->jabatan->first()->id}}"><i class="fas fa-plus"></i></a>
                            <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$data->jabatan->first()->id}}" data-namajabatan="{{$data->jabatan->first()->nama}}"><i class="fas fa-edit"></i></a>
                            <a href="/admin_skpd/jabatan/delete/{{$data->jabatan->first()->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin Ingin Di Hapus?');"></i></a>
                            @if (count($data->jabatan->first()->bawahan) != 0)
                                <ul>
                                    @foreach ($data->jabatan->first()->bawahan as $subJabatan)
                                    <li>{{$subJabatan->nama}}            
                                        <a href="#" class="btn btn-xs btn-success add-subjabatan" data-idjabatan="{{$subJabatan->id}}"><i class="fas fa-plus"></i></a>
                                        <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$subJabatan->id}}" data-namajabatan="{{$subJabatan->nama}}"><i class="fas fa-edit"></i></a>
                                        <a href="/admin_skpd/jabatan/delete/{{$subJabatan->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin Ingin Di Hapus?');"></i></a>
                                    @if (count($subJabatan->bawahan) != 0)
                                        <ul>
                                            @foreach ($subJabatan->bawahan as $kabid)
                                                <li>{{$kabid->nama}}
                                                    <a href="#" class="btn btn-xs btn-success add-subjabatan" data-idjabatan="{{$kabid->id}}"><i class="fas fa-plus"></i></a>
                                                    <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$kabid->id}}" data-namajabatan="{{$kabid->nama}}"><i class="fas fa-edit"></i></a>
                                                    <a href="/admin_skpd/jabatan/delete/{{$kabid->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin Ingin Di Hapus?');"></i></a>
                                                
                                                    @if (count($kabid->bawahan) != 0)
                                                        <ul>
                                                            @foreach ($kabid->bawahan as $kasi)
                                                                <li>{{$kasi->nama}}
                                                                <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$kasi->id}}" data-namajabatan="{{$kasi->nama}}"><i class="fas fa-edit"></i></a>
                                                                <a href="/admin_skpd/jabatan/delete/{{$kasi->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Di Hapus?');"><i class="fas fa-trash"></i></a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        
                                    @endif
                                    </li>
                                    @endforeach
                                </ul>
                                    
                            @else
                                
                            @endif
                        </li>
                    </ul>
                    
                    @endif
                </td>
                
            </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('skpd.jabatan.modal_add')
@include('skpd.jabatan.modal_edit')
@endsection

@push('js')

<!-- DataTables -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).on('click', '.add-jabatan', function() {
        idskpd = $(this).data('idskpd');
        document.getElementById("idskpd").value = idskpd;
        $('#modal-default').modal('show');
    });

    $(document).on('click', '.edit-jabatan', function() {
        idjabatan = $(this).data('idjabatan');
        document.getElementById("idjabatanedit").value = idjabatan;
        namajabatan = $(this).data('namajabatan');
        document.getElementById("edit_nama_jabatan").value = namajabatan;
        $('#modal-default-edit').modal('show');
    });

    $(document).on('click', '.add-subjabatan', function() {
        idjabatan = $(this).data('idjabatan');
        document.getElementById("idjabatan").value = idjabatan;
        $('#modal-default2').modal('show');
    });
</script>
@endpush