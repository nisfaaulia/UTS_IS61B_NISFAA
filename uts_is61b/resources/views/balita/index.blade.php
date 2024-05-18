
@extends('layouts.master')
@section('title','Data Balita')
@section('judul','Data Balita')
@section('nama','Posyandu')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card-header">
        <a href="/siswa/form/" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah data </a>
       </div>
       <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jenjang Pendidikan</th>
                            <th>No.HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sis as $item)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->tgl}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->jjg}}</td>
                        <td>{{$item->hp}}</td>
                        <td>
                            <a href="/siswa/edit/{{$item->nisn}}" class="btn btn-info btn-xs"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{$item->nisn}}">
                                <i class="fa fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus{{$item->nisn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Yakin ingin menghapus data siswa <b>{{$item->nama}}</b>?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="/siswa/{{$item->nisn}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>

                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak Ada Data</td>
                    </tr>
                @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
