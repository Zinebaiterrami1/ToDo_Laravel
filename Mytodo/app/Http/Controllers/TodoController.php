<?php

namespace App\Http\Controllers;

use session;
use App\Models\todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    //
    public function index(){

        $todo = todo::all();
        return view('todos.index', [
            'todo'=> $todo
        ]);
    }

    public function create(){
        return view('todos.create');
    }
    public function store(TodoRequest $request){
        //$request->validated();
        todo::create([
            'title' => $request->title,
            'description' => $request->description,
             'is_completed'=> 0
        ]);

        $request->session()->flash('alert-success','Todo Created successfully');
        return to_route('todos.index');
    }
    public function show($id){
        $todo = todo::find($id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the Todo');

            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('todos.show' , ['todo' => $todo]);

    }
    
    public function edit($id){
        $todo = todo::find($id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the Todo');

            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
        return view('todos.edit' , ['todo' => $todo]);

    }

    public function update(TodoRequest $request){
        $todo = todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the Todo');

            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }
       $todo->update([
        'title'=> $request->title,
        'description'=> $request->description,
        'is_completed'=> $request->is_completed,
       ]);
       $request->session()->flash('alert-success','Todo Updated successfully');
       return to_route('todos.index');

    }

    public function destroy(Request $request){
        $todo = todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the Todo');

            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate the Todo'
            ]);
        }

        $todo->delete();
        $request->session()->flash('alert-success','Todo Deleted Successfully');
        return to_route('todos.index');
    }
}
