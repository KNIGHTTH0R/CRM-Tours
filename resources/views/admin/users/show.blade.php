@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: пользователь {{ $user->name }}</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                <div class="form-group">
                    <table class="table">
                        <thead class="text-info">
                        <tr>
                            <td>Имя</td>
                            <td>Email</td>
                            <td>Телефон</td>
                            <td>Агентство</td>
                            <td>Статус</td>
                            <td>Туры</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td> @if($user->agency)
                                    {{ $user->agency->name }}
                                @else
                                    {{ ('Не присвоено') }}
                                @endif
                            </td>
                            <td>{{ $user->status() }}</td>
                            <td> </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="m-md-0">
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Редактировать</a>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

@endsection