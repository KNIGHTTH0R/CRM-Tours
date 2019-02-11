@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        @component('layouts.components.success')
        @endcomponent
        <div class="container">
            <h3>Панель управления: агентство {{ $agency->name }} - все клиенты</h3>
            <hr>
            <h5>Агент: {{ $agent->name }}</h5>
            <hr>
            <div class="row">
                @component('agent.components.sidebar')
                @endcomponent
                <div class="col-md-10">
                    <table class="table">
                        <thead class="text-info">
                        <tr>
                            <td>Имя</td>
                            <td>E-mail</td>
                            <td>Телефон</td>
                            <td>Туры</td>
                            <td>Статус</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if(!$user->is_admin && !$user->is_agent)
                            <tr>
                                <td><a href="{{route('users.edit', $user->id)}}" class="text table-light">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->tours()->count() > 0)
                                            @foreach($user->tours as $tour)
                                                <li style="list-style-type: none">{{ $tour->name }}</li>
                                            @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if ($user->tours()->count() > 0)
                                        @foreach($user->tours as $tour)
                                            <li style="list-style-type: none">{{ $tour->pivot->status }}</li>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection