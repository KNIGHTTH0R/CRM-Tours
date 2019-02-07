@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        @component('layouts.components.success')
        @endcomponent
        <div class="container">
            <h3>Панель управления: Пользователи</h3>
            <hr>
            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent
                <div class="col-md-10">
                    <a href="{{ route('users.create') }}" class="btn btn-info">{{ __('Добавить пользователя') }}</a>
                    <hr>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Имя</td>
                            <td>Агентство</td>
                            <td>E-mail</td>
                            <td>Статус</td>
                            <td>Управление</td>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                <td>
                                    @if($user->agency)
                                    {{ $user->agency->name }}
                                        @else
                                    {{ ('Не присвоено') }}
                                        @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status() }}</td>
                                <td>
                                    <a href="{{route('users.edit', $user->id)}}" class="alert-link">Редактировать</a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-outline-dark" type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                <ul class="pagination pull-right">
                                    {{ $users->links() }}
                                </ul>
                            </td>
                        </tr>
                        <tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection