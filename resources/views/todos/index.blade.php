

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Todo List</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create Todo</a>
        <ul class="list-group">
            @foreach ($todos as $todo)
                <li class="list-group-item">
                    {{ $todo->title }}
                    <div class="float-right">
                        <a href="{{ route('todos.show', $todo) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this todo item?')">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
