@extends('layouts.dashboard')

@section('title')
    Halaman Tambah Arsip Surat
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('arsip_tambah') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <span class="px-3">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</span>
            <br>
            <span class="px-3">Catatan:</span><br>
            <ul class="mx-4">
                <li>Gunakan file berformat PDF</li>
            </ul>
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2 mt-3">
                    <form class="px-4" action="{{ route('archives.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="example-text-input" class="col-form-label-lg text-center">
                                        Nomor Surat</label>
                                </div>
                                <div class="col-1">
                                    <label for="example-text-input" class="col-form-label-lg text-center">:</label>
                                </div>
                                <div class="col-4">
                                    <input class="form-control @error('no_surat') is-invalid @enderror" type="text"
                                        id="example-text-input" value="{{ old('no_surat') }}" name="no_surat"
                                        placeholder="Isi nomor surat">
                                    @error('no_surat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="example-text-input" class="col-form-label-lg text-center">Kategori</label>
                                </div>
                                <div class="col-1">
                                    <label for="example-text-input" class="col-form-label-lg text-center">:</label>
                                </div>
                                <div class="col-4">
                                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                        <option value="" disabled selected>-Pilih-</option>
                                        <option value="Undangan" @if (old('kategori') == 'Undangan') selected @endif>Undangan
                                        </option>
                                        <option value="Pengumuman" @if (old('kategori') == 'Pengumuman') selected @endif>
                                            Pengumuman</option>
                                        <option value="Nota Dinas" @if (old('kategori') == 'Nota Dinas') selected @endif>Nota
                                            Dinas</option>
                                        <option value="Pemberitahuan" @if (old('kategori') == 'Pemberitahuan') selected @endif>
                                            Pemberitahuan</option>
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="example-text-input" class="col-form-label-lg text-center">Judul</label>
                                </div>
                                <div class="col-1">
                                    <label for="example-text-input" class="col-form-label-lg text-center">:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="judul" value="{{ old('judul') }}"
                                        class="form-control @error('judul') is-invalid @enderror" placeholder="Judul surat">
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="example-text-input" class="col-form-label-lg text-center">File Surat
                                        (PDF)</label>
                                </div>
                                <div class="col-1">
                                    <label for="example-text-input" class="col-form-label-lg text-center">:</label>
                                </div>
                                <div class="col-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('file') is-invalid @enderror"
                                            style="height: 42px;" value="{{ old('file') }}" id="namefile"
                                            placeholder="Belum ada file dipilih">
                                        <div class="input-group-append">
                                            <button id="files" class="btn btn-primary"
                                                onclick="document.getElementById('file').click(); return false;">Browse
                                                File</button>
                                        </div>
                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="file" id="file" onbeforeeditfocus="return false;"
                                        class="form-control" style="visibility: hidden;" name="file"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col">
                                <a class="btn btn-icon btn-sm btn-secondary  " type="button"
                                    href="{{ route('archives.index') }}">
                                    <span class="btn-inner--icon"><i class="fas fa-arrow-left"></i> | Kembali</span>
                                </a>
                                <button class="btn btn-icon btn-sm btn-primary " type="submit">
                                    <span class="btn-inner--icon"><i class="fas fa-save"></i> | Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css-internal')
    <style type="text/css">
        input[type="file"] {
            width: 500px;
            vertical-align: middle;
            direction: rtl;
            content: "Tidak ada file terpilih"
        }



        input[type="file"]::-webkit-file-upload-button {
            background: #485dc5;
            color: #FFFFFF;
            line-height: 38px;
            padding: 0px 20px;
            border: none;
            float: right;

        }
    </style>
@endpush

@push('javascript-internal')
    <script type="text/javascript">
        $('#file').change(function() {
            const file = document.querySelector('input[type=file]').files[0];
            var filename = file.name;
            $('#namefile').val(filename);
        });
    </script>
@endpush
