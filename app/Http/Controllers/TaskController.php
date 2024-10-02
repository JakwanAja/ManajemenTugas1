<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan semua task
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Menampilkan form untuk membuat task baru
    public function create()
    {
        return view('tasks.create');
    }

    // Menyimpan task baru
    public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'status' => 'required|in:pending,in_progress,completed',
        'due_date' => 'required|date',
        'user_id' => 'required|exists:users,id'
    ]);

    // Simpan data ke database
    Task::create($validatedData);

    return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan');
}


    // Menampilkan detail task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Menampilkan form untuk mengedit task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Mengupdate task
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui.');
    }

    // Menghapus task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus.');
    }
}
