@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: агентство {{ $agency->name }}</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                <div class="form-group">
                     <h5>Агентство {{ $agency->name }}</h5>

                </div>
            </div>
        </div>
    </div>

@endsection