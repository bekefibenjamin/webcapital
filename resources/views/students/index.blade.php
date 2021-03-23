@extends('layouts.app')

@section('content')
<body>
    <div id="app" class="bg">
        <header class=" mt-4">
            <div class="container">
                <div class="row dark-card py-2 mb-6">
                    <div class="col-6 text-center">
                        <span>{{ __('Bejelentkezve: '.$username) }}</span>
                    </div>
                    <div class="col-3 text-center">
                        <a href="{{ route('students.create') }}">
                            <button class="btn btn-dark">{{ __('Új diák felvétele') }}</button>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-dark">{{ __('Kijelentkezés') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container h-100 zindex-2">
                <div class="h-100 justify-content-center align-items-center">
                    <div class="dark-card row">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Vezetéknév') }}</th>
                                <th scope="col">{{ __('Keresztnév') }}</th>
                                <th scope="col">{{ __('Jel') }}</th>
                                <th scope="col">{{ __('Csoport') }}</th>
                                <th scope="col">{{ __('Testvérek') }}</th>
                                <th scope="col">{{ __('Szerkesztés') }}</th>
                                <th scope="col">{{ __('Törlés') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->last_name }}</td>
                                    <td>
                                        <img class="sign-preview" src="{{ isset($student->file->sign) && file_exists("storage/signs/" . $student->file->sign) ? asset("storage/signs/" . $student->file->sign) : asset("storage/signs/empty.svg") }}" alt=""/>
                                    </td>
                                    <td>{{ $student->group }}</td>
                                    <!-- Ha nem elérhető a testvérek száma, azt X-szel jelezzük -->
                                    <td>{{ isset($student->address->siblings_num) ? $student->address->siblings_num : "X" }}</td>
                                    <td>
                                        <a href="{{ route('students.edit', $student->id) }}">
                                            <button class="btn index-btn">{{ __('Szerkesztés') }}</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Törlés esetén megerősítés -->
                                            <button class="btn index-btn" onclick="return confirm('Biztos vagy benne, hogy ki szeretnéd törölni a következő diákot:\n{{ $student->first_name.' '.$student->last_name }} ?' )">{{ __('Törlés') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination oldal linkek -->
                        {{ $students->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
@endsection
