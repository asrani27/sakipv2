@extends('admin.app')
@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush
@section('title')
  <h3>Jabatan</h3>
@endsection

@section('content') 
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <table id="example1" class="table table-sm table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Satuan Kerja</th>
            <th>Jabatan</th>
        </tr>
        </thead>
        @php
            $no =1;
        @endphp
        <tbody>
            @foreach ($data as $item)        
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    @if (count($item->jabatan) == 0)
                    <a href="#" class="btn btn-xs btn-success add-jabatan" data-idskpd="{{$item->id}}"><i class="fas fa-plus"></i></a>
                    @else
                    <ul>
                        <li>{{$item->jabatan->first()->nama}}
                            <a href="#" class="btn btn-xs btn-success add-subjabatan" data-idskpd="{{$item->id}}" data-idjabatan="{{$item->jabatan->first()->id}}"><i class="fas fa-plus"></i></a>
                            <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$item->jabatan->first()->id}}" data-namajabatan="{{$item->jabatan->first()->nama}}"><i class="fas fa-edit"></i></a>
                            <a href="/data/jabatan/delete/{{$item->jabatan->first()->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                            @if (count($item->jabatan->first()->bawahan) != 0)
                                <ul>
                                    @foreach ($item->jabatan->first()->bawahan as $subJabatan)
                                    <li>{{$subJabatan->nama}}            
                                        <a href="#" class="btn btn-xs btn-success add-subjabatan" data-idjabatan="{{$subJabatan->id}}"><i class="fas fa-plus"></i></a>
                                        <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$subJabatan->id}}" data-namajabatan="{{$subJabatan->nama}}"><i class="fas fa-edit"></i></a>
                                        <a href="/data/jabatan/delete/{{$subJabatan->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                                    @if (count($subJabatan->bawahan) != 0)
                                        <ul>
                                            @foreach ($subJabatan->bawahan as $kabid)
                                                <li>{{$kabid->nama}}
                                                    <a href="#" class="btn btn-xs btn-success add-subjabatan" data-idjabatan="{{$kabid->id}}"><i class="fas fa-plus"></i></a>
                                                    <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$kabid->id}}" data-namajabatan="{{$kabid->nama}}"><i class="fas fa-edit"></i></a>
                                                    <a href="/data/jabatan/delete/{{$kabid->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                                                
                                                    @if (count($kabid->bawahan) != 0)
                                                        <ul>
                                                            @foreach ($kabid->bawahan as $kasi)
                                                                <li>{{$kasi->nama}}
                                                                <a href="#" class="btn btn-xs btn-warning edit-jabatan" data-idjabatan="{{$kasi->id}}" data-namajabatan="{{$kasi->nama}}"><i class="fas fa-edit"></i></a>
                                                                <a href="/data/jabatan/delete/{{$kasi->id}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('admin.jabatan.modal_add')

@include('admin.jabatan.modal_edit')
@endsection

@push('js')

<!-- DataTables -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endpush