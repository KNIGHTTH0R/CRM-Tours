@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        <div class="container">
            <h3>Панель управления агента: редактировать тур</h3>
            <hr>
            @component('layouts.components.errors')
            @endcomponent

            <div class="row">
                @component('agent.components.sidebar')
                @endcomponent


                <div class="form-group">
                    <form action="{{ route('tours.update', $tour->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <label for="name">Название:</label>
                        <input type="text" class="table table-light" name="name" value="{{ $tour->name }}">
                        <br>
                        <label for="country">Страна:</label>
                        <input type="text" class="table table-light" name="country" value="{{ $tour->country }}">
                        <br>
                        <label for="city">Город:</label>
                        <input type="text" class="table table-light" name="city" value="{{ $tour->city }}">
                        <br>
                        <label for="hotel">Отель:</label>
                        <input type="text" class="table table-light" name="hotel" value="{{ $tour->hotel }}">
                        <br>
                        <label for="price">Цена:</label>
                        <input type="text" class="table table-light" name="price" value="{{ $tour->price }}">
                        <br>
                        <label for="start_date">Дата начала тура:</label>
                        <input type="date" class="table table-light" name="start_date" value="{{ $tour->start_date }}">
                        <br/>
                        <label for="end_date">Дата завершения тура:</label>
                        <input type="date" class="table table-light" name="end_date" value="{{ $tour->end_date }}">
                        <br/>
                        <label for="room_capacity">Вместимость номера:</label>
                        <select class="dropdown dropdown-toggle-split" name="room_capacity">
                            @foreach(range(1, 6) as $num)
                                <option value="{{ $num }}">{{ $num }}</option>
                            @endforeach

                        </select>
                        <br>
                        <label for="meal_service">Тип питания:</label>
                        <select class="dropdown dropdown-toggle-split" name="meal_service">
                            @foreach($mealServises as $servis)
                                <option value="{{ $servis }}">{{ $servis }}</option>
                            @endforeach
                        </select>
                        <br>


                        <br><br/>
                        <button  class="btn btn-primary" type="submit">Обновить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection