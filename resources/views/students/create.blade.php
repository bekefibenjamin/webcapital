@extends('layouts.app')

@section('content')
<body class="h-100">
    <div id="app" class="bg">
        <main class="h-100">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <div class="dark-card py-5 mx-0 row ">
                            <h1 class="col-12 text-center">{{ __('Új diák') }}</h1>
                            <div class="col-lg-10">
                                <form method="POST" action="{{ route('students.store') }}" class="form-font" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="first_name">{{ __('Vezetéknév') }}</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" minlength="3" value="{{ old('first_name') }}" required>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="last_name">{{ __('Keresztnév') }}</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" minlength="3" value="{{ old('last_name') }}" required>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="group">{{ __('Csoport') }}</label>
                                            <input type="text" class="form-control @error('group') is-invalid @enderror" id="group" name="group" minlength="3" value="{{ old('group') }}" required>
                                            @error('group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="age">{{ __('Kor') }}</label>
                                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" min="0" max="999" name="age" value="{{ old('age') }}" required>
                                            @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="sign">{{ __('Jel feltöltése') }}</label>
                                            <input type="file" class="form-control-file" name="sign" id="sign">
                                            @error('sign')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="siblings_num">{{ __('Testvérek száma') }}</label>
                                            <input type="number" class="form-control @error('siblings_num') is-invalid @enderror" id="siblings_num" min="0" max="99" name="siblings_num" value="{{ old('siblings_num') }}" required>
                                            @error('siblings_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="zip">{{ __('Irányítószám') }}</label>
                                            <input type="number" class="form-control @error('zip') is-invalid @enderror" id="zip" min="999" max="9999" name="zip" value="{{ old('zip') }}" required>
                                            @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="city">{{ __('Város') }}</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" minlength="3" value="{{ old('city') }}" required>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="street_name">{{ __('Utca') }}</label>
                                            <input type="text" class="form-control @error('street_name') is-invalid @enderror" id="street_name" name="street_name" minlength="3" value="{{ old('street_name') }}" required>
                                            @error('street_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="street_number">{{ __('Házszám') }}</label>
                                            <input type="number" class="form-control @error('street_number') is-invalid @enderror" id="street_number" min="0" max="99999" name="street_number" value="{{ old('street_number') }}" required>
                                            @error('street_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center text-center">
                                        <div class="col-6 py-4">
                                            <button type="submit" class="btn dark-btn">
                                                {{ __('Felvétel') }}
                                            </button>
                                            <a class="btn small-dark-btn" href="{{ route('students.index') }}">Mégse</a>
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
