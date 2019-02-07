@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: тур {{ $tour->name }}</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent
                    <div class="col-md-10">
                        <table class="table">
                            <thead class="text-info">
                            <tr>
                                <td>Название</td>
                                <td>Агентство</td>
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
                                <tr>
                                    <td>{{ $tour->name }}</td>
                                    <td>{{  $tour->agency->name }}</td>
                                    <td>{{ $tour->country }}</td>
                                    <td>{{ $tour->city }}</td>
                                    <td>{{ $tour->hotel }}</td>
                                    <td>С {{ $tour->start_date }} по {{ $tour->end_date }}</td>
                                    <td>{{ $tour->meal_service }}</td>
                                    <td>{{ $tour->room_capacity }}</td>
                                    <td>{{ $tour->price }} грн</td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="m-md-0">
                            <a href="{{route('tours.edit', $tour->id)}}" class="btn btn-primary">Редактировать</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection