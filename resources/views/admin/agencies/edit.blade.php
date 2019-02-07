@extends('layouts.layout')

@section('content')



    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: редактировать агентство</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                <div class="form-group">
                    <form action="{{ route('agencies.update', $agency->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <label for="name">Название агенства:</label>
                        <input type="text" class="form-control" name="name" value="{{ $agency->name }}">
                        @component('layouts.components.errors')
                        @endcomponent
                        <br>
                        <button  class="btn btn-primary" type="submit">Изменить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection