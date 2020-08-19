<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {
        $data = array();
        $data['todos'] = Todo::all();


        return view('todos.index', $data);
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);


        $data = $request->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo created successfully.');

        return redirect(route('todos.index'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();


        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo updated successfully.');


        return redirect(route('todos.index'));

    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully.');


        return redirect(route('todos.index'));
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo completed successfully.');

        return redirect(route('todos.index'));
    }
}
