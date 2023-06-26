@extends('layouts-dash.template')

@section('content')     
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Tambah Data baru </h5>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jadwal.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <div class="input-group input-group-merge">                            
                            <select class="form-select" name="hari">
                                <option selected>-- Pilih Hari --</option>
                                @foreach($ar_hari as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam Pelajaran</label>
                        <div class="input-group input-group-merge">
                            <input type="time" name="jam_pelajaran" class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <div class="input-group input-group-merge">
                            <select class="form-select" name="kelas_id">
                                <option selected>-- Pilih Kelas --</option>
                                @foreach($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guru</label>
                        <div class="input-group input-group-merge">
                            <select class="form-select" name="guru_id">
                                <option selected>-- Pilih Guru --</option>
                                @foreach($guru as $gr)
                                    <option value="{{ $gr->id }}">{{ $gr->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mapel</label>
                        <div class="input-group input-group-merge">
                            <select class="form-select" name="mapel_id">
                                <option selected>-- Pilih Mapel --</option>
                                @foreach($mapel as $mpl)
                                    <option value="{{ $mpl->id }}">{{ $mpl->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ route('jadwal.index') }}">
                                <i class='fas fa-fw fa-arrow-left'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary">
                                <i class='fas fa-fw fa-save'></i>  Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection