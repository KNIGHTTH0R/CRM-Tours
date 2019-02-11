@extends('layouts.layout')

@section('content')
    <div id="wrapper">
        <div class="container">
            <h3>Панель управления: агентство {{ $agency->name }}</h3>
            <hr>
            <h5>Агент: {{ $agent->name }} | Клиент: {{ $user->name }}</h5>
            <hr>
            <div class="row">
                @component('agent.components.sidebar')
                @endcomponent
                <div class="col-md-10">
                    @component('layouts.components.errors')
                    @endcomponent

                        <div class="form-group">

                                <h5 class="text-info">Все туры клиента</h5><br/>

                                @foreach($user->tours as $tour)
                                        <table class="table">
                                            <tr>
                                                <td>{{ $tour->name }}</td>
                                                <td>Статус:
                                                    @if(!$tour->pivot->status)
                                                        Не назначен
                                                    @endif
                                                    {{ $tour->pivot->status }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('agent.tours.status', $user->id) }}" method='post'>
                                                        @csrf
                                                        <li style="list-style-type: none">
                                                            <select class="dropdown-toggle" name="tour_status">
                                                                <option></option>
                                                                <option value="завершен">завершен</option>
                                                                <option value="оплачен">оплачен</option>
                                                                <option value="ждет оплаты">ждет оплаты</option>
                                                            </select>

                                                            <button class="btn btn-outline-secondary" type="submit" name="tour_id" value="{{ $tour->id }}">
                                                                Изменить статус
                                                            </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('agent.tours.delete', $user->id) }}" method='post'>
                                                        @method('PATCH')

                                                            @csrf
                                                            <button  class="btn btn-outline-dark" value="{{$tour->id}}" name="detach_id" type="submit">
                                                                Удалить тур
                                                            </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                @endforeach
                            <br/>
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    @method('PATCH')
                                    @csrf

                                <label for="tour_id" class="font-weight-light">Добавить тур:</label><br/>
                                <div class="btn-group">
                                    <select class="dropdown-toggle" name="tour_id">
                                        <option></option>
                                        @foreach($tours as $tour)
                                            <option value="{{ $tour->id }}">{{ $tour->name }}</option>
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
    </div>

@endsection
