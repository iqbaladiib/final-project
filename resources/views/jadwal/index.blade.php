@extends('layouts-dash.template')

@section('content')                            
                <!-- Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800 my-auto">Data Informasi Jadwal</h1>
                        <div class="p-3 my-auto">
                            <a class="btn btn-primary" title="Tambah Jenis Barang" href=" {{ route('jadwal.create') }}">
                                <i class="
                                fas fa-fw fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the</p>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p style="padding: 0px;">{{ $message }}</p>
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tables Jadwal</h6>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Jam Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Guru</th>
                                            <th>Mapel</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no= 1; @endphp
                                        @foreach($jadwalJoin as $row)
                                        <tr class="">
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $row->hari }}</td>
                                            <td class="text-center">{{ $row->jam_pelajaran }}</td>
                                            <td class="text-center">{{ $row->nama_kelas }}</td>
                                            <td class="text-center">{{ $row->nama_guru }}</td>
                                            <td class="text-center">{{ $row->nama_mapel }}</td>
                                            <td class="text-center">

                                                <form method="POST" action="{{ route('jadwal.destroy',$row->id) }}">
                                                    @csrf
                                                    @method('DELETE')                                                   

                                                    <!-- aksi untuk edit data -->
                                                    <a class="btn btn-warning btn-sm" href=" {{ route('jadwal.edit',$row->id) }}">
                                                        <i class='fas fa-fw fa-pen'></i>
                                                    </a>
                                                    &nbsp;

                                                    <!-- aksi untuk hapus data -->
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Data akan diHapus?')">
                                                        <i class='fas fa-fw fa-trash'></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>   
                                        @endforeach                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>    
                <!-- End of Content -->
                @endsection
             

                