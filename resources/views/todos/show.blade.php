

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $todo->title }}</h1>
        <p>{{ $todo->description }}</p>
        <a href="{{ route('todos.edit', $todo) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this todo item?')">Delete</button>
        </form>
    </div>
@endsection
