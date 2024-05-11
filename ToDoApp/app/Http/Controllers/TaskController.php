<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $todos = Task::all();
        return view('Task.index', ['todos'=> $todos]);

    }
    public function create(){
        return view('Task.create');
    }
    public function store(TodoRequest $request){

        //$request()->validated();
        Task::create([
            'title' => $request->title,
            'description'=> $request->description,
            'completed' => 0
        ]);

        $request->session()->flash('alert-success','Task Created Succesfully');
        return to_route('tasks.index');   
    } 
    public function show($id){
        $todo = Task::find($id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the task');
            return to_route('tasks.index')->withErrors(['error' => 'Unable to locate the task']);

        }
        return view('Task.show', ['todo'=> $todo]);
    }
    public function edit($id){

        $todo = Task::find($id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the task');
            return to_route('tasks.index')->withErrors(['error' => 'Unable to locate the task']);

        }
        return view('Task.edit', ['todo'=> $todo]);
    }
    public function update(TodoRequest $request){
        $todo = Task::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the task');
            return to_route('tasks.index')->withErrors(['error' => 'Unable to locate the task']);
    }
    $todo->update([
        'title'=> $request->title,
        'description'=> $request->description,
        'completed' => $request->completed
        ]);
        $request->session()->flash('alert-info','Task Updated Succesfully');
        return to_route('tasks.index');   
    }
    public function destroy(Request $request){
        $todo = Task::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error','Unable to locate the task');
            return to_route('tasks.index')->withErrors(['error' => 'Unable to locate the task']);
    }
    $todo->delete();
    $request->session()->flash('alert-success','Task Deleted Succesfully');
        return to_route('tasks.index');  
    }
}
