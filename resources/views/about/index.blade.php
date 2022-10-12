@extends('layouts.dashboard')

@section('title')
    About
@endsection

@push('css-internal')
    <style type="text/css">
        .foto {
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            border-radius: 0.75rem;
            height: 100%;
            width: 125%;
            transition: all .2s ease-in-out;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <!-- list users -->
        <div class="col-md-12 mt-3">
            <div class="card h-auto d-flex">
                <div class="card-body">
                    <div class="row mx-0">
                        <div class="col-md-1 text-center">
                            <img src="{{ asset('vendor/img/Foto_Mohammad Shofiullah Ulinuha_Manajemen Informatika.png') }}"
                                alt="..." class="foto shadow">
                        </div>
                        <div class="col-md-4 ">
                            <Table>
                                <tbody>
                                    <tr>
                                        Aplikasi ini dibuat oleh:
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td> : </td>
                                        <td>Mohammad Shofiullah Ulinuha</td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td> : </td>
                                        <td>1931730071</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td> : </td>
                                        <td>11 Oktober 2022</td>
                                    </tr>
                                </tbody>
                            </Table>
                        </div>
                        {{-- <span>Nama : Mohammad Shofiullah Ulinuha</span><br>
                                <span>Nim : 1931730071</span><br>
                                <span>Tanggal : 11 Oktober 2022</span> --}}
                    </div>
                    {{-- <i class="fas fa-id-badge fa-10x"></i> --}}
                    {{-- <div class="name ps-3"> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
