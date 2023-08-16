<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index',[
            'todos'=>Todo::all(),
        ]);
    }
    public function create(Request $request)
    {
        Todo::newTodo($request);
        return back()->with('message','Todo Created successfully');
    }

    public function markDone(Request $request)
    {
        Todo::updateStatus($request);
        return back()->with('message', 'Todo Completed');
    }
    public function edit($id)
    {
        return view('todo.edit', [
            'todo' => Todo::find($id),
        ]);
    }
    public function update(Request $request,$id)
    {
        Todo::updateTodo($request,$id);
        return redirect('/')->with('message', 'Todo Updated Successfully.');
    }
    public function delete($id)
    {
        Todo::deleteTodo($id);
        return back()->with('message', 'Todo Successfully Deleted');
    }
}
