<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the Todo items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all(); // Retrieve all Todo items
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new Todo item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created Todo item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Todo::create($request->all()); // Create new Todo item
        return redirect()->route('todos.index')->with('success', 'Todo item created successfully.');
    }

    /**
     * Display the specified Todo item.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified Todo item.
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified Todo item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update($request->all()); // Update Todo item
        return redirect()->route('todos.index')->with('success', 'Todo item updated successfully.');
    }

    /**
     * Remove the specified Todo item from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete(); // Delete Todo item
        return redirect()->route('todos.index')->with('success', 'Todo item deleted successfully.');
    }
}
