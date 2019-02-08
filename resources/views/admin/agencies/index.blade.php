@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        @component('layouts.components.success')
            @endcomponent
        <div class="container">
            <h3>Панель управления: Агентства</h3>
            <hr>
            <div class="row">
                @component('admin.components.sidebar')
                    @endcomponent
                <div class="col-md-10">
                    <a href="{{ route('agencies.create') }}" class="btn btn-info">Добавить агентство</a>
                    <hr>

                    <table class="table">
                        <thead>
                        <tr>
                            <td>Название</td>
                            <td>Агенты</td>
                            <td>Туры</td>
                            <td>Управление</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agencies as $agency)
                        <tr>
                            <td><a href="{{ route('agencies.show', $agency->id) }}">{{ $agency->name }}</a></td>
                            <td>
                                @forelse($agency->users as $user)
                                    @if($user->is_agent)
                                        <li style="list-style-type: none"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }} </a></li>
                                    @endif
                                    @empty
                                    Не назначен
                                @endforelse
                            </td>
                            <td><a href="{{route('agency.tours', $agency->id)}}">Смотреть все туры</a> </td>
                            <td>
                                <a href="{{route('agencies.edit', $agency->id)}}" class="alert-link">Редактировать</a>

                                <form action="{{ route('agencies.destroy', $agency->id) }}" method="POST">
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
                                {{ $agencies->links() }}
                                </ul>
                            </td>
                        </tr>

                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection