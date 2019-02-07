@extends('layouts.layout')

@section('content')
    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: все туры агентства {{ $agency->name }}</h3>
            <hr>
            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent
                <div class="col-md-10">
<table class="table">
    <thead>
    <tr>
        <td>Название</td>
        <td>Страна</td>
        <td>Цена</td>
        <td>Управление</td>
    </tr>
    </thead>
    <tbody>
    @foreach($tours as $tour)

        <tr>
            <td><a href="{{ route('tours.show', $tour->id) }}">{{ $tour->name }}</a></td>
            <td>{{ $tour->country }}</td>
            <td>{{ $tour->price }} грн</td>
            <td>
                <a href="{{route('tours.edit', $tour->id)}}" class="alert-link">Редактировать</a>

                <form action="{{ route('tours.destroy', $tour->id) }}" method="POST">
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

            </ul>
        </td>
    </tr>

    </tfoot>

</table>
                </div></div></div><
    </div>

    @endsection