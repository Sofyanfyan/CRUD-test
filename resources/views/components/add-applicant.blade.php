@extends('master')
@section('content')

<div class="container-fluid mt-5 p-3">
    <form method="POST" action={{ route('create-action') }}
                        enctype="multipart/form-data">
      @csrf
      @method("POST")
        {{-- ==================PERSONAL================== --}}
        <div class="card">
            <div class="card-header">
                Personal
            </div>
            <div class="card-body">


                <div class="row">
                    <div class="me-2">
                        <label for="inputPassword5" class="form-label">Posisi dilamar</label>
                        <input class="form-control form-control-lg" name="posisi_lamaran" type="text"
                            placeholder="posisi yang akan dilamar" aria-label="default input example" value="{{old('posisi_lamaran') ? old('posisi_lamaran'):  "" }}" required>
                           @if($errors->any())
                                        <p style="color: red">{{$errors->first('posisi_lamaran')}}</p>
                           @endif
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Nama Lengkap</label>
                        <input class="form-control" name="nama_lengkap" type="text" placeholder="Isi nama lengkap"
                            aria-label="default input example" value="{{old('nama_lengkap') ? old('nama_lengkap'):  "" }}" required>
                            @if($errors->any())
                                        <p style="color: red">{{$errors->first('nama_lengkap')}}</p>
                           @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Nama panggilan</label>
                        <input class="form-control" name="nama_panggilan" type="text" placeholder="Isi nama panggilan"
                            aria-label="default input example" value="{{old('nama_panggilan') ? old('nama_panggilan'):  "" }}" required>
                            @if($errors->any())
                                        <p style="color: red">{{$errors->first('nama_panggilan')}}</p>
                           @endif
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="inputPassword5" class="form-label">Tempat Tanggal Lahir</label>
                        <input class="form-control" name="tempat_tanggal_lahir" type="text"
                            placeholder="Gresik, 19 Januari 2000" aria-label="default input example" value="{{old('tempat_tanggal_lahir') ? old('tempat_tanggal_lahir'):  "" }}" required>
                             @if($errors->any())
                                        <p style="color: red">{{$errors->first('tempat_tanggal_lahir')}}</p>
                           @endif
                    </div>
                    <div class="col-md-3">
                        <label for="inputPassword5" class="form-label">Jenis kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                            <option value="" disabled {{old('jenis_kelamin')? "":  "selected" }}>Open this select menu</option>
                            <option {{strtolower(old('jenis_kelamin')) == 'pria' ? "selected":  "" }}>Pria</option>
                            <option {{strtolower(old('jenis_kelamin')) == 'wanita' ? "selected":  "" }}>Wanita</option>
                        </select>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('jenis_kelamin')}}</p>
                           @endif
                    </div>
                    <div class="col-md-3">
                        <label for="inputPassword5" class="form-label">Kebangsaan</label>
                        <input class="form-control" name="kebangsaan" type="text" placeholder="Isi kebangsaan anda"
                            name="kebangsaan" aria-label="default input example" value="{{old('kebangsaan') ? old('kebangsaan'):  "" }}" required>
                            @if($errors->any())
                                        <p style="color: red">{{$errors->first('kebangsaan')}}</p>
                           @endif
                    </div>
                    <div class="col-md-3">
                        <label for="inputPassword5" class="form-label">Agama</label>
                        <select class="form-select" aria-label="Default select example" name="agama" required>
                            <option value="" disabled {{old('agama')? "":  "selected" }}>Open this select menu</option>
                            <option {{old('agama') == 'Islam' ? "selected":  "" }}>Islam</option>
                            <option {{old('agama') == 'Kristen' ? "selected":  "" }}>Kristen</option>
                            <option {{old('agama') == 'Katolik' ? "selected":  "" }}>Katolik</option>
                            <option {{old('agama') == 'Hindu' ? "selected":  "" }}>Hindu</option>
                            <option {{old('agama') == 'Buddha' ? "selected":  "" }}>Buddha</option>
                            <option {{old('agama') == 'Konghucu' ? "selected":  "" }}>Konghucu</option>
                        </select>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('agama')}}</p>
                           @endif
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Pendidikan terakhir</label>
                        <select class="form-select" aria-label="Default select example" name="pendidikan_terakhir" required>
                            <option value="" disabled {{old('pendidikan_terakhir')? "":  "selected" }}>Open this select menu</option>
                            <option {{old('pendidikan_terakhir') == 'SD' ? "selected":  "" }}>SD</option>
                            <option {{old('pendidikan_terakhir') == 'SMP' ? "selected":  "" }}>SMP</option>
                            <option {{old('pendidikan_terakhir') == 'SMA' ? "selected":  "" }}>SMA</option>
                            <option {{old('pendidikan_terakhir') == 'S1' ? "selected":  "" }}>S1</option>
                            <option {{old('pendidikan_terakhir') == 'S2' ? "selected":  "" }}>S2</option>
                            <option {{old('pendidikan_terakhir') == 'S3' ? "selected":  "" }}>S3</option>
                        </select>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('pendidikan_terakhir')}}</p>
                           @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Jurusan</label>
                        <input class="form-control" name="jurusan" type="text" placeholder="Isi jurusan pendidikan terakhir"
                            aria-label="default input example" value="{{old('jurusan') ? old('jurusan'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('jurusan')}}</p>
                        @endif
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputPassword5" class="form-label">Sekolah</label>
                        <input class="form-control" name="sekolah" type="text" placeholder="Isi sekolah terakhir"
                            aria-label="default input example" value="{{old('sekolah') ? old('sekolah'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('sekolah')}}</p>
                        @endif
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="inputPassword5" class="form-label">IPK/Nilai</label>
                        <input class="form-control" name="ipk" type="number" placeholder="Masukan IPK atau nilai"
                            aria-label="default input example" step="0.01" value="{{old('ipk') ? old('ipk'):  "" }}"  required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('ipk')}}</p>
                        @endif
                    </div>
                    <div class="col-md-12 mt-5">
                        <label for="inputPassword5" class="form-label">Alamat Terakhir</label>
                        <textarea class="form-control" name="alamat_terakhir" placeholder="Alamat terakhir" id="floatingTextarea2"
                            style="height: 100px" required>{{old('alamat_terakhir') ? old('alamat_terakhir'):  "" }}</textarea>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('alamat_terakhir')}}</p>
                        @endif
                    </div>
                </div>

            </div>

        </div>


        {{-- ==================Family================== --}}

        <div class="card mt-5">
            <div class="card-header">
                Family
            </div>
            <div class="card-body">

               <div class="row mt-5">
                    <div class="col-md-4">
                        <label for="inputPassword5" class="form-label">Sudah menikah?</label>
                        <select class="form-select" aria-label="Default select example" name="kawin" required>
                            <option value="" disabled selected>Open this select menu</option>
                            <option>Sudah</option>
                            <option>Belum</option>
                        </select>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('kawin')}}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword5" class="form-label">Jumlah saudara kandung</label>
                        <input class="form-control" name="jml_saudara_kandung" type="number" placeholder="Isi jumlah saudara kandung"
                            aria-label="default input example" value="{{old('jml_saudara_kandung') ? old('jml_saudara_kandung'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('jml_saudara_kandung')}}</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword5" class="form-label">Jumlah anak</label>
                        <input class="form-control" name="jml_anak" type="number" placeholder="Isi jumlah anak"
                            aria-label="default input example" value="{{old('jml_anak') ? old('jml_anak'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('jml_anak')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Nama Ayah</label>
                        <input class="form-control" name="nama_ayah" type="text" placeholder="Isi nama ayah"
                            aria-label="default input example" value="{{old('nama_ayah') ? old('nama_ayah'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('nama_ayah')}}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Nama Ibu</label>
                        <input class="form-control" name="nama_ibu" type="text" placeholder="Isi nama ibu"
                            aria-label="default input example" value="{{old('nama_ibu') ? old('nama_ibu'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('nama_ibu')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Pekerjaan Ayah</label>
                        <input class="form-control" name="pekerjaan_ayah" type="text" placeholder="Isi pekerjaan ayah"
                            aria-label="default input example" value="{{old('pekerjaan_ayah') ? old('pekerjaan_ayah'):  "" }}" required>
                         @if($errors->any())
                                        <p style="color: red">{{$errors->first('pekerjaan_ayah')}}</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Pekerjaan Ibu</label>
                        <input class="form-control" name="pekerjaan_ibu" type="text" placeholder="Isi pekerjaan ibu"
                            aria-label="default input example" value="{{old('pekerjaan_ibu') ? old('pekerjaan_ibu'):  "" }}" required>
                        @if($errors->any())
                                        <p style="color: red">{{$errors->first('pekerjaan_ibu')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
<input type="submit" role="button" class="btn btn-success w-100 my-5">
</form>
</div>


@endsection
