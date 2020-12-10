@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{route('todos.store')}}" method="POST">
                    @csrf
                    <h1>Create new todo</h1>
                    <a role="button" href="{{route('home')}}" class="btn btn-primary">Go back</a>
                    <div class="form-group mt-4">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"
                                  rows="3"
                                  style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
