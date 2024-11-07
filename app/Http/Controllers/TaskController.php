<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category; // Pastikan untuk mengimpor model Category
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // Menampilkan semua task
    public function index(Request $request)
    {
        // Ambil status dan kategori yang dipilih dari query string
        $selectedStatus = $request->input('status', 'all');
        $selectedCategory = $request->input('category_id', 'all');

        // Ambil semua kategori dari database
        $categories = Category::all();

        // Buat query untuk mengambil tasks
        $query = Task::with('category'); // Pastikan untuk memuat relasi kategori

        // Filter berdasarkan status jika bukan 'all'
        if ($selectedStatus !== 'all') {
            $query->where('status', $selectedStatus);
        }

        // Filter berdasarkan kategori jika bukan 'all'
        if ($selectedCategory !== 'all') {
            $query->where('category_id', $selectedCategory);
        }

        // Gunakan paginate untuk mengambil 10 data per halaman
        $tasks = $query->paginate(10);

        // Kembalikan view dengan data yang diperlukan
        return view('tasks.index', compact('tasks', 'categories', 'selectedStatus', 'selectedCategory'));
    }

    public function taskCounts()
    {
        $taskCounts = DB::table('tasks')
                        ->rightJoin('categories', 'tasks.category_id', '=', 'categories.id')
                        ->select('categories.name', DB::raw('COUNT(tasks.id) as task_count'))
                        ->groupBy('categories.name')
                        ->get();

        return view('tasks.counts', compact('taskCounts')); // Mengirim data ke view
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
    public function __construct()
    {
    $this->middleware('auth');
    }

}

