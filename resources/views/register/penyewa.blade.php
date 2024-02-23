<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Rental Mobil</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Tambahkan sumber Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card-header {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            font-family: 'Arial', sans-serif;
            /* Ganti dengan font yang Anda inginkan */
        }

        body {
            font-family: 'Arial', sans-serif;
            /* Ganti dengan font yang Anda inginkan */
            background-color: deepskyblue;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Registrasi Penyewa') }}</div>
                    <div class="card-body">
                        <form id="loginForm" method="POST" action="{{ route('register_penyewa') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 password-toggle">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Masukkan Password" name="password" required
                                        autocomplete="current-password">
                                    <button type="button" class="btn btn-outline-secondary toggle-password"><i
                                            class="bi bi-eye-slash"></i></button>
                                </div>
                                <span id="password-error" class="text-danger"></span>
                                <!-- Tempat untuk menampilkan pesan kesalahan -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('Daftar') }}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="mt-3 text-center">
                                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');
        const passwordError = document.querySelector('#password-error');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye-slash');
            this.querySelector('i').classList.toggle('bi-eye');
        });

        // Validasi panjang password
        passwordInput.addEventListener('input', function() {
            if (passwordInput.value.length < 8) {
                passwordError.textContent = 'Password must be at least 8 characters long.';
            } else {
                passwordError.textContent = '';
            }
        });
    </script>
</body>

</html>
