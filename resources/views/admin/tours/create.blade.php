@extends('layouts.layout')

@section('content')
    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: добавить тур</h3>
            <hr>

            <div class="row">
                @component('admin.components.sidebar')
                @endcomponent

                @component('layouts.components.errors')
                    @endcomponent

                <div class="form-group">
                    <form action="{{ route('tours.store') }}" method="POST">
                        @csrf
                        <label for="name">Название:</label>
                        <input type="text" class="table table-light" name="name" value="{{ old('name') }}">
                        <br>
                        <label for="country">Страна:</label>
                        <input type="text" class="table table-light" name="country" value="{{ old('country') }}">
                        <br>
                        <label for="city">Город:</label>
                        <input type="text" class="table table-light" name="city" value="{{ old('city') }}">
                        <br>
                        <label for="hotel">Отель:</label>
                        <input type="text" class="table table-light" name="hotel" value="{{ old('hotel') }}">
                        <br>
                        <label for="price">Цена:</label>
                        <input type="text" class="table table-light" name="price" value="{{ old('price') }}">
                        <br>
                        <label for="start_date">Дата начала тура:</label>
                        <input type="date" class="table table-light" name="start_date">
                        <br/>
                        <label for="end_date">Дата завершения тура:</label>
                        <input type="date" class="table table-light" name="end_date">
                        <br/>
                        <label for="room_capacity">Вместимость номера:</label>
                        <select class="dropdown dropdown-toggle" name="room_capacity">
                             @foreach(range(1, 6) as $num)
                            <option value="{{ $num }}">{{ $num }}</option>
                            @endforeach

                        </select>
                        <br>
                        <label for="meal_service">Тип питания:</label>
                        <select class="dropdown dropdown-toggle" name="meal_service">
                            @foreach($mealServises as $servis)
                            <option value="{{ $servis }}">{{ $servis }}</option>
                                @endforeach
                        </select>
                        <br>
                        <label for="agency_id">Агентство:</label>
                        <div class="btn-group">
                             <select class="dropdown dropdown-toggle" name="agency_id">
                                 @foreach($agencies as $agency)
                                 <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                 @endforeach
                             </select>
                        </div>

                        <br><br/>
                        <button  class="btn btn-primary" type="submit">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection