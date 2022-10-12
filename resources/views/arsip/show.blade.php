@extends('layouts.dashboard')

@section('title')
    Halaman Lihat
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('arsip_lihat', $archive) }}
@endsection

@push('css-internal')
    <style type="text/css">
        .spacex {
            width: 150px
        }
    </style>
@endpush

@section('content')
    <table class="w-65">
        <tbody>
            <tr>
                <td class="spacex px-3">Nomor</td>
                <td>:</td>
                <td>{{ $archive->no_surat }}</td>
            </tr>
            <tr>
                <td class="spacex px-3">Kategori</td>
                <td>:</td>
                <td>{{ $archive->kategori }}</td>
            </tr>
            <tr>
                <td class="spacex px-3">Judul</td>
                <td>:</td>
                <td>{{ $archive->judul }}</td>
            </tr>
            <tr>
                <td class="spacex px-3">Waktu Unggah</td>
                <td>:</td>
                <td>{{ $archive->created_at }}</td>
            </tr>
        </tbody>
    </table>
    <iframe src="{{ asset('/laraview/#../storage/' . $archive->file) }}" width="100%" height="600px"></iframe>
    <a class="btn btn-icon btn-sm bg-white m-auto" type="button" href="{{ route('archives.index') }}">
        <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i> | Kembali</span>
    </a>
    <a class="btn btn-icon btn-sm btn-warning m-auto" type="button"
        href="{{ route('download', ['filename' => $archive->file]) }}">
        <span class="btn-inner--icon"><i class="fa fa-download"></i> | Unduh</span>
    </a>
    <a class="btn btn-icon btn-sm btn-secondary m-auto" type="button"
        href="{{ route('archives.edit', ['archive' => $archive]) }}">
        <span class="btn-inner--icon"><i class="fa fa-pen"></i> | Edit/Ganti File</span>
    </a>
@endsection

@push('javascript-internal')
@endpush
