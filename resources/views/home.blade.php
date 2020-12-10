@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h1>Your todos</h1>
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('user'))
                    <a role="button" href="{{route('todos.create')}}" class="btn btn-primary my-4">Create</a>
                @endif
                <div class="row">
                    @foreach($todos as $todo)
                        <div class="col-md-3 mr-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$todo->title}}
                                    </h5>
                                    <p class="card-text">
                                        {{$todo->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
