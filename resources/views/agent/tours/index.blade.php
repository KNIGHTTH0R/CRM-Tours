@extends('layouts.layout')

@section('content')
    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: агентство {{ $agency->name }} - все туры</h3>
            <hr>
            <h5>Агент: {{ $user->name }}</h5>
            <hr>
            <div class="row">
                @component('agent.components.sidebar')
                @endcomponent
                <div class="col-md-10">

                    <table class="table">
                        <thead class="text-info">
                        <tr>
                            <td>Название</td>
                            <td>Страна</td>
                            <td>Город</td>
                            <td>Отель</td>
                            <td>Даты</td>
                            <td>Питание</td>
                            <td>Вместимость номера</td>
                            <td>Цена</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tours as $tour)
                            <tr>
                                <td>{{ $tour->name }}</td>
                                <td>{{ $tour->country }}</td>
                                <td>{{ $tour->city }}</td>
                                <td>{{ $tour->hotel }}</td>
                                <td>С {{ $tour->start_date }} по {{ $tour->end_date }}</td>
                                <td>{{ $tour->meal_service }}</td>
                                <td>{{ $tour->room_capacity }}</td>
                                <td>{{ $tour->price }} грн</td>
                                <td>
                                    <a href="{{route('tours.edit', $tour->id)}}" class="alert-link">Редактировать</a>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection