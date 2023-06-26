@extends('layouts-dash.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Edit Data</h5>
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
                <form method="POST" action="{{ route('presensi.update',$row->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <div class="input-group input-group-merge">                            
                            <select class="form-select" name="siswa_id">
                                <option selected>-- Pilih Nama Siswa --</option>
                                @foreach($siswa as $ssw)
                                    @php $sel = ($ssw->id == $row->siswa_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $ssw->id }}" {{ $sel }}>{{ $ssw->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="input-group input-group-merge">
                            <select class="form-select" name="status">
                                <option selected>-- Pilih Status --</option>
                                @foreach($ar_status as $sts)
                                    @php $sel = ($sts == $row->status) ? 'selected' : ''; @endphp
                                    <option value="{{ $sts }}" {{ $sel }}>{{ $sts }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal</label>
                        <div class="input-group input-group-merge">
                            <select class="form-select" name="jadwal_id">
                                <option selected>-- Pilih Jadwal --</option>
                                @foreach($jadwal as $jdwl)
                                    @php $sel = ($jdwl->id == $row->jadwal_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $jdwl->id }}" {{ $sel }}>{{ $jdwl->hari }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ route('presensi.index') }}">
                                <i class='fas fa-fw fa-arrow-left'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" >                               <i class='fas fa-fw fa-save'></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection