<?php

namespace App\Http\Controllers;

use App\Models\Task; // ضروري تزيد هادي باش الكنترولر يعرف موديل Task
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 1. عرض كاع المهام
    public function index()
    {
        $tasks = Task::latest()->get(); 
        return view('tasks.index', compact('tasks'));
    }

    // 2. عرض الصفحة (Form) فين غنزيدو مهمة جديدة
    public function create()
    {
        return view('tasks.create');
    }

    // 3. حفظ المهمة الجديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // 4. عرض الصفحة (Form) باش نعدلو مهمة ديجا كاينا
    public function edit(Task $task) // استعملنا Task $task باش يقلب عليها اوتوماتيكيا
    {
        return view('tasks.edit', compact('task'));
    }

    // 5. تحديث البيانات في قاعدة البيانات
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // 6. مسح مهمة
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}