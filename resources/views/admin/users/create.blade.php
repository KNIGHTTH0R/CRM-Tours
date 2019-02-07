@extends('layouts.layout')

@section('content')
    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: добавить пользователя</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                @component('layouts.components.errors')
                @endcomponent

                <div class="form-group">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <label for="name">Имя:</label>
                        <input type="text" class="table table-light" name="name" value="{{ old('name') }}">
                        <br>
                        <label for="email">E-mail:</label>
                        <input type="text" class="table table-light" name="email" value="{{ old('email') }}">
                        <br>
                        <label for="phone">Телефон:</label>
                        <input type="text" class="table table-light" name="phone" value="{{ old('phone') }}">
                        <br>
                        <label for="password">Пароль:</label>
                        <input type="text" class="table table-light" name="password" value="">
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
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_admin" value="1">

                            <label class="form-check-label" for="is_admin">
                                {{ __('Администратор') }}
                            </label>
                        </div>

                        <br><br/>
                        <button  class="btn btn-primary" type="submit">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection