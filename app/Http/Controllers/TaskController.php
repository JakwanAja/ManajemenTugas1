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

        // Buat query untuk mengambil tasks dengan relasi category dan user
        $query = Task::with('category', 'user'); 

        if ($selectedStatus !== 'all') {
            $query->where('status', $selectedStatus);
        }

        // Filter berdasarkan kategori jika bukan 'all'
        if ($selectedCategory !== 'all') {
            $query->where('category_id', $selectedCategory);
        }

        // Gunakan paginate untuk mengambil 10 data per halaman
        $tasks = $query->paginate(10);

        // Mengambil task yang overdue dengan scope
        $overdueTasks = Task::overdue()->get();

        // Kembalikan view dengan semua data yang diperlukan
        return view('tasks.index', compact('tasks', 'categories', 'selectedStatus', 'selectedCategory', 'overdueTasks'));
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
        $categories = Category::all();

        return view('tasks.create', compact('categories'));

    }

    // Menyimpan task baru
    public function store(Request $request)
    {
    
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'category_id' => 'required|exists:categories,id', // Pastikan category_id divalidasi
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id'

        ]);

        // Simpan task ke database
        Task::create($validatedData);

        // Gunakan transaksi untuk memastikan integritas data
        DB::transaction(function () use ($validatedData) {
            Task::create($validatedData);
        });

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan dengan transaksi yang aman.');

    }

    // Menampilkan detail task
    public function show(Task $task)
    {
        // Muat data kategori dan user
        $task->load('category', 'user');

        return view('tasks.show', compact('task'));
    }

    // Menampilkan form untuk mengedit task
    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));

    }

    // Mengupdate task
    public function update(Request $request, Task $task)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        // Update task dengan data yang sudah tervalidasi
        $task->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui.');
    }

    // Menghapus task
    public function destroy(Task $task)
    {
        $task->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus.');
    }

    // Constructor untuk memastikan user sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }
}
