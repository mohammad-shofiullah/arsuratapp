@extends('layouts.dashboard')

@section('title')
    Halaman Arsip Surat
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('arsip') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="w-65">
                <tbody>
                    <tr>
                        <span class="px-3">
                            Berikut ini adalah surat-surat yang telah terbit dan diarsipkan klik "Lihat" pada kolom aksi
                            untuk
                            menampilkan surat.
                        </span>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <td class="p-3 w-20">Cari Surat</td>
                        <td>:</td>
                        <td>
                            <form action="{{ route('archives.index') }}" method="GET" class="mt-2">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control" style="height: 42px"
                                        placeholder="Cari berdasarkan judul surat">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                            Cari
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-7">Nomor Surat
                                    </th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-7 ps-2">
                                        Kategori</th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-7 ps-2">
                                        Judul</th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-7 ps-2">
                                        Waktu Pengarsipan</th>
                                    <th class="text-uppercase text-xs font-weight-bolder opacity-7 ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($archives as $archive)
                                    <tr>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder px-4"
                                            scope="row">
                                            {{ $archive->no_surat }}
                                        </td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            {{ $archive->kategori }}
                                        </td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            {{ $archive->judul }}
                                        </td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            <?php
                                            $date = \Illuminate\Support\Carbon::parse($archive->created_at)->translatedFormat('d F Y H:i');
                                            echo $date;
                                            ?>
                                        </td>
                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder w-30">
                                            <form class="d-inline"
                                                action="{{ route('archives.destroy', ['archive' => $archive]) }}"
                                                role="alert" method="POST" alert-title="Hapus Arsip"
                                                alert-text="Apakah anda yakin ingin menghapus arsip surat ini?"
                                                alert-btn-cancel="Batal" alert-btn-yes="Iya">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-icon btn-sm btn-danger m-auto" type="submit">
                                                    <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                                                </button>
                                            </form>
                                            <a class="btn btn-icon btn-sm btn-warning m-auto" type="button"
                                                href="{{ route('download', ['filename' => $archive->file]) }}">
                                                <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                                            </a>
                                            <a class="btn btn-icon btn-sm btn-primary m-auto" type="button"
                                                href="{{ route('archives.show', ['archive' => $archive]) }}">
                                                <span class="btn-inner--icon"><i class="fas fa-eye"></i> | Lihat</span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 text-center"
                                            style="background:rgba(147, 146, 147, 0.38);">Data tidak
                                            tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row ">
                        <div class="col-md-4  ">
                            <small class="text-secondary text-xxs mx-4">
                                Menampilkan {{ $archives->firstItem() }} sampai {{ $archives->lastItem() }} dari
                                {{ $archives->total() }} data dimiliki
                            </small>
                        </div>
                        <div class="col">
                            {{ $archives->links('layouts._dashboard.my-paginate') }}
                        </div>
                    </div>
                </div>
            </div>

            <a class="btn btn-icon btn-sm  bg-white m-auto" type="button" href="{{ route('archives.create') }}">
                <span class="btn-inner--icon"><i class="fas fa-archive"></i> | Arsipkan Surat</span>
            </a>
        </div>
    </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        event.target.submit();
                    }
                });
            });
        });
    </script>
@endpush
