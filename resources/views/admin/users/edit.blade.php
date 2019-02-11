@extends('layouts.layout')

@section('content')
    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: изменение данных пользователя {{ $user->name }}</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                @component('layouts.components.errors')
                @endcomponent

                <div class="form-group">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <label for="name">Имя:</label>
                        <input type="text" class="table table-light" name="name" value="{{ $user->name }}">
                        <br>
                        <label for="email">E-mail:</label>
                        <input type="text" class="table table-light" name="email" value="{{ $user->email }}">
                        <br>
                        <label for="phone">Телефон:</label>
                        <input type="text" class="table table-light" name="phone" value="{{ $user->phone }}">
                        <br>

                        <label for="agency_id">Агентство:</label><br/>
                        <div class="btn-group">
                            <select class="dropdown dropdown-toggle" name="agency_id">
                                <option></option>
                                @foreach($agencies as $agency)
                                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br/>
                        <br/>
                        <label class="text-body">Статус:</label><br/>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_agent" value="1">

                            <label class="form-check-label" for="is_agent">
                                {{ __('Агент') }}
                            </label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_agent" value="0">

                                <label class="form-check-label" for="is_admin">
                                    {{ __('удалить из агентов') }}
                                </label>
                            </div>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin" value="1">

                            <label class="form-check-label" for="is_admin">
                                {{ __('Администратор') }}
                            </label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_admin" value="0">

                                <label class="form-check-label" for="is_admin">
                                    {{ __('удалить из администраторов') }}
                                </label>
                            </div>

                        </div>


                        <br><br/>
                        <button  class="btn btn-primary" type="submit">Изменить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection