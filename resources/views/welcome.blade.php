@extends('layouts.app')

@section('content')
<body class="h-100">
    <div id="app" class="bg">
        <main class="h-100">
            <div class="container h-100 zindex-2">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <div class="dark-card py-5">
                            <div class="card-body my-auto py-0">
                                <h5 class="card-title">
                                    <div class="row justify-content-center">
                                        <span class="col-8">{{ __('Webcapital Teszt Feladat') }}</span>
                                    </div>
                                </h5>
                                <h5 class="card-subtitle"></h5>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row justify-content-center">
                                        <label for="email" class="col-8 col-form-label text-center">{{ __('E-mail cím') }}</label>

                                        <div class="col-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="password" class="col-8 col-form-label text-center">{{ __('Jelszó') }}</label>
                                        <div class="col-8">
                                            <input id="password" type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center text-center">
                                        <div class="col-6 py-4">
                                            <button type="submit" class="btn dark-btn">
                                                {{ __('Bejelentkezés') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
@endsection
