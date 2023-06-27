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

                <!-- Form Edit untuk Role Guru -->
                @if(auth()->check() && auth()->user()->role == 'guru')
                <form method="POST" action="{{ route('guru.update',Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Guru</label>
                        <div class="input-group input-group-merge">                            
                            <input type="text" name="nama" value="{{ $row->nama }}"class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="nip" value="{{ $row->nip }}"class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="no_telp" value="{{ $row->no_telp }}"class="form-control"/>
                        </div>
                    </div>

                    
                    <h5 class="mb-4 mt-5">Form Edit User</h5>
                    <div class="form-group">
                        <label for="exampleInputNama">Email</label>
                        <input type="email" class="form-control" id="exampleInputNama" name="email" placeholder="" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama">Username</label>
                        <input type="text" class="form-control" id="exampleInputNama" name="username" placeholder="" value="{{$user->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama">Reset Password</label>
                        <input type="password" class="form-control" id="passinput" name="password" placeholder="" value="" minlength="8"> 
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <script>
                            function myFunction() {
                            var x = document.getElementById("passinput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                        </script>
                    </div>           
                    <input type="hidden"  name="user_id" value="{{$user->id}}">         
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ route('dashboard') }}">
                                <i class='fas fa-fw fa-arrow-left'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" >               
                                <i class='fas fa-fw fa-save'></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
                @endif

                <!-- Form Edit untuk Role Siswa -->
                @if(auth()->check() && auth()->user()->role == 'siswa')
                <form method="POST" action="{{ route('siswa.update',Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <div class="input-group input-group-merge">                            
                            <input type="text" name="nama" value="{{ $row->nama }}"class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="nisn" value="{{ $row->nisn }}"class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Orang Tua</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="nama_ortu" value="{{ $row->nama_ortu }}"class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="no_telp" value="{{ $row->no_telp }}"class="form-control"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <div class="input-group input-group-merge">
                            <select class="form-select" name="kelas_id">
                                <option selected>-- Pilih Kelas --</option>
                                @foreach($kelas as $kls)
                                    @php $sel = ($kls->id == $row->kelas_id) ? 'selected' : ''; @endphp
                                    <option value="{{ $kls->id }}" {{ $sel }}>{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    
                    <h5 class="mb-4 mt-5">Form Edit User</h5>
                    <div class="form-group">
                        <label for="exampleInputNama">Email</label>
                        <input type="email" class="form-control" id="exampleInputNama" name="email" placeholder="" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama">Username</label>
                        <input type="text" class="form-control" id="exampleInputNama" name="username" placeholder="" value="{{$user->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama">Reset Password</label>
                        <input type="password" class="form-control" id="passinput" name="password" placeholder="" value=""> 
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <script>
                            function myFunction() {
                            var x = document.getElementById("passinput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                        </script>
                    </div>           
                    <input type="hidden"  name="user_id" value="{{$user->id}}">         
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ route('dashboard') }}">
                                <i class='fas fa-fw fa-arrow-left'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" >               
                                <i class='fas fa-fw fa-save'></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
                @endif

                @if(auth()->check() && auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('siswa.update',Auth::user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')            
                    <div class="form-group">
                        <label for="exampleInputNama">Email</label>
                        <input type="email" class="form-control" id="exampleInputNama" name="email" placeholder="" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama">Username</label>
                        <input type="text" class="form-control" id="exampleInputNama" name="username" placeholder="" value="{{$user->username}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNama">Reset Password</label>
                        <input type="password" class="form-control" id="passinput" name="password" placeholder="" value=""> 
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <script>
                            function myFunction() {
                            var x = document.getElementById("passinput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                        </script>
                    </div>           
                    <input type="hidden"  name="user_id" value="{{$user->id}}">         
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <div class="input-group input-group-merge">
                            <a class="btn btn-info" title="Kembali" href=" {{ route('dashboard') }}">
                                <i class='fas fa-fw fa-arrow-left'></i> Kembali
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-primary" >               
                                <i class='fas fa-fw fa-save'></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
                @endif




            </div>
        </div>
    </div>
</div>
@endsection