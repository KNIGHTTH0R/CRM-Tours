@extends('layouts.layout')

@section('content')



    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: добавить агентство</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                <div class="form-group">
                    <form action="{{ route('agencies.store') }}" method="POST">
                        @csrf
                        <label for="name">Название агенства:</label>
                        <input type="text" class="form-control" name="name">
                        @component('layouts.components.errors')
                        @endcomponent
                        <br>
                        <button  class="btn btn-primary" type="submit">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection