@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                @if( Auth::user()->is_admin )
                <a href="{{ route('agencies.index') }}">Панель управления</a>

                    @else (Auth::user()->is_agent)
                        <a href="{{ route('agent.tours') }}">Панель управления</a>
                    @endif
                </div>

                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
