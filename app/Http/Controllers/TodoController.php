<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkIfCanExecuteActions();
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkIfCanExecuteActions();
        Todo::create([
            'title' => $request->post('title'),
            'description' => $request->post('description'),
            'completed' => false,
            'user_id' => auth()->id()
        ]);
        session()->flash('status', 'Todo created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkIfCanExecuteActions();
        $todo = Todo::findOrFail($id);
        $todo->title = $request->post('title');
        $todo->description = $request->post('description');
        $todo->completed = $request->post('completed');
        $todo->save();
        session()->flash('status', 'Todo updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkIfCanExecuteActions();
        $todo = Todo::findOrFail($id);
        $todo->destroy();
        session()->flash('status', 'Todo deleted successfully');
        return back();
    }

    private function checkIfCanExecuteActions()
    {
        $canCreate = auth()->user()->hasRole('admin') || auth()->user()->hasRole('user');
        if (!$canCreate) {
            abort(403, "You don't have the permissions to perform this action");
        }
    }
}
