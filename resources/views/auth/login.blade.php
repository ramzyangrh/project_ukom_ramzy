<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rental Mobil</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card-header {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            font-family: 'Arial', sans-serif;
        }
        body {
            font-family: 'Arial', sans-serif; 
            background-color: deepskyblue;
        }
        .forgot-password-link, .register-link {
            text-decoration: none;
        }
        .remember-me-checkbox{
            margin-top: 10px; 
        }
        .btn-login{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form id="loginForm" method="POST" action="{{ route('login.authenticate') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="mb-3 password-toggle">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <button type="button" class="btn btn-outline-secondary toggle-password"><i class="bi bi-eye-slash"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 text-start">
                                <a href="" class="forgot-password-link">{{ __('Forgot Your Password?') }}</a>
                            </div>
                            <div class="form-check mb-3 remember-me-checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-login">{{ __('Login') }}</button>
                            </div>
                            <div class="mt-3 text-start register-text">
                                Belum punya akun? <span class="register-link"><a href="">{{ __('Daftar') }}</a></span>
                            </div>                                                                                                                                                                                                 
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

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye-slash');
            this.querySelector('i').classList.toggle('bi-eye');
        });
    </script>
</body>
</html>