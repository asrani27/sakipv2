@extends('admin.flatty')
@push('css')

@endpush

@section('content') 
<div class="col-xs-12">
    <div class='page-header page-header-with-buttons'>
        <h1 class='pull-left'>
            <i class='fa fa-sitemap'></i>
            <span>Peta Jabatan</span>
        </h1>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
                <div class='box-header'>
                    <div class='title'>
                        <i class="fa fa-home"></i> <strong>{{Auth::user()->skpd->nama}}</strong>
                    </div>
                    <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                        </a>
                    </div>
                </div>
                <div class='box-content'>
                    <div id="tree1">
                    
                    @if (count($data->unitkerja) == 0)
                    <a href="#" class="btn btn-xs btn-success add-unit-kerja">Tambah</a>
                    @else
                    <ul id='tree1-treeData'>
                        @foreach ($data->unitkerja->where('unit_kerja_id', null) as $item)
                        <li class='folder expanded' id='tree1id3'>
                            {{$item->nama}}
                            <button href="#" class="btn btn-xs btn-warning edit-unitkerja" data-idunitkerja="{{$item->id}}" data-namaunitkerja="{{$item->nama}}"><i class="fa fa-edit"></i></button>
                            <button href="#" class="btn btn-xs btn-danger delete-unit" data-idunitkerjadelete="{{$item->id}}"><i class="fa fa-trash"></i></button>
                            <button href="#" class="btn btn-xs btn-success add-subunit" data-idunitkerja="{{$item->id}}"><i class="fa fa-plus"></i> Sub Unit</button>
                        
                            @if (count($item->bawahan) != 0)
                            <ul>
                                @foreach ($item->bawahan as $item2)
                                    
                                <li id='tree1id3.1' class="folder expanded">
                                    {{$item2->nama}}
                                    <button href="#" class="btn btn-xs btn-warning edit-unitkerja" data-idunitkerja="{{$item2->id}}" data-namaunitkerja="{{$item2->nama}}"><i class="fa fa-edit"></i></button>
                                    <button href="#" class="btn btn-xs btn-danger delete-unit" data-idunitkerjadelete="{{$item2->id}}"><i class="fa fa-trash"></i></button>
                                    <button href="#" class="btn btn-xs btn-success add-subunit" data-idunitkerja="{{$item2->id}}"><i class="fa fa-plus"></i> Sub Unit</button>
                                   
                                    @if (count($item2->bawahan) != 0)
                                        <ul>
                                            @foreach ($item2->bawahan as $item3)
                                            <li id='tree1id3.1' class="folder expanded">
                                                {{$item3->nama}}
                                                <button href="#" class="btn btn-xs btn-warning edit-unitkerja" data-idunitkerja="{{$item3->id}}" data-namaunitkerja="{{$item3->nama}}"><i class="fa fa-edit"></i></button>
                                                <button href="#" class="btn btn-xs btn-danger delete-unit" data-idunitkerjadelete="{{$item3->id}}"><i class="fa fa-trash"></i></button>
                                            
                                            </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    {{-- <ul>
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
                    </ul>  --}}
                    
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@include('skpd.unitkerja.modal_add')
@include('skpd.unitkerja.modal_delete')
@include('skpd.unitkerja.modal_edit')
@endsection

@push('js')

<script src="/admin/assets/javascripts/plugins/fancytree/jquery.fancytree.min.js" type="text/javascript"></script>
<script>
    
    $(document).on('click', '.add-unit-kerja', function() {
        $('#modal-default').modal('show');
    });

    $(document).on('click', '.edit-unitkerja', function() {
        idunitkerja = $(this).data('idunitkerja');
        document.getElementById("idunitkerjaedit").value = idunitkerja;
        namaunitkerja = $(this).data('namaunitkerja');
        document.getElementById("edit_nama_jabatan").value = namaunitkerja;
        
        $('#modal-default-edit').modal('show');
    });

    $(document).on('click', '.add-subunit', function() {
        idunitkerja = $(this).data('idunitkerja');
        document.getElementById("idunitkerja").value = idunitkerja;
        $('#modal-default2').modal('show');
    });
    
    $(document).on('click', '.delete-unit', function() {
        idunitkerjadelete = $(this).data('idunitkerjadelete');
        document.getElementById("idunitkerja_delete").value = idunitkerjadelete;
        $('#modal-default-delete').modal('show');
    });

    var icons = {
        map: {
            doc: "fa fa-file-o",
            docOpen: "fa fa-file-o",
            checkbox: "fa fa-square-o",
            checkboxSelected: "fa fa-check-square-o",
            checkboxUnknown: "fa fa-square",
            dragHelper: "fa arrow-right",
            dropMarker: "fa long-arrow-right",
            error: "fa fa-warning",
            expanderClosed: "fa fa-caret-right",
            expanderLazy: "fa fa-angle-right",
            expanderOpen: "fa fa-caret-down",
            folder: "fa fa-institution",
            folderOpen: "fa fa-sitemap",
            loading: "fa fa-spinner fa-pulse"
        }
    };

    $("#tree1").fancytree({
        extensions: ["glyph"],
        selectMode: 3,
        glyph: icons
    });

    $("#tree2").fancytree({
        extensions: ["glyph"],
        selectMode: 3,
        glyph: icons,
        source: [
            {title: "Node 1", key: "1"},
            {title: "Folder 2", key: "2", folder: true, children: [
                {title: "Node 2.1", key: "3"},
                {title: "Node 2.2", key: "4"}
            ]}
        ]
    });

    $("#tree3").fancytree({
        extensions: ["dnd", "edit", "glyph", "table"],
        dnd: {
            focusOnClick: true,
            dragStart: function(node, data) { return true; },
            dragEnter: function(node, data) { return true; },
            dragDrop: function(node, data) { data.otherNode.copyTo(node, data.hitMode); }
        },
        glyph: icons,
        source: [
            {title: "Node 1", key: "1"},
            {title: "Folder 2", key: "2", folder: true, children: [
                {title: "Node 2.1", key: "3"},
                {title: "Node 2.2", key: "4"}
            ]}
        ],
        table: {
            checkboxColumnIdx: 1,
            nodeColumnIdx: 2
        },

        activate: function(event, data) {
        },
        renderColumns: function(event, data) {
            var node = data.node,
                    $tdList = $(node.tr).find(">td");
            $tdList.eq(0).text(node.getIndexHier());
            $tdList.eq(3).text(!!node.folder);
        }
    });
    </script>
    
@endpush
