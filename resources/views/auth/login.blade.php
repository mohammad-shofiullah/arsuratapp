<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('vendor/css/style-login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>ArSuratApp</h1>
                <span>Aplikasi ini dibuat oleh:</span>
                <table style="text-align: left;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>M. Shofiullah Ulinuha</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>1931730071</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>
                            <?php
                            echo \Carbon\Carbon::now()->translatedFormat('d F Y');
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Selamat Datang</h1>
                <br>
                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" placeholder="Kata Sandi"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <button type="submit">Masuk</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="{{ asset('vendor/img/admin.png') }}" height="150px" width="150px" alt="">
                    <br>
                    <button class="ghost" id="signIn">Kembali</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>ArSuratApp</h1>
                    <p>Arsip Surat Application</p>
                    <button class="ghost" id="signUp">Informasi</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/js/script-login.js') }}" charset="utf-8"></script>
</body>

</html>
