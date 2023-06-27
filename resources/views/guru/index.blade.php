@extends('layouts-dash.template')

@section('content')                            
                <!-- Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800 my-auto">Data Informasi Guru</h1>                        
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Tables Guru</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Kontak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no= 1; @endphp
                                        @foreach($guru as $row)
                                        <tr class="">
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $row->nama }}</td>
                                            <td class="text-center">{{ $row->nip }}</td>
                                            <td class="text-center">{{ $row->no_telp }}</td>
                                
                                            <td class="text-center">

                                                <form method="POST" action="{{ route('guru.destroy',$row->id) }}">
                                                    @csrf
                                                    @method('DELETE')                                                   

                                                    <!-- aksi untuk edit data -->
                                                    <a class="btn btn-warning btn-sm" href=" {{ route('guru.edit',$row->id) }}">
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
             

                