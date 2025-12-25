<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-200 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 p-10 border">
        
        <div class="mb-8">
            <h2 class="text-3xl font-black text-slate-900">Edit Task</h2>
            <p class="text-slate-500 mt-2 font-medium">Update your goal details.</p>
        </div>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
            @csrf 
            @method('PUT') <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Task Title</label>
                <input type="text" name="title" value="{{ $task->title }}" required 
                    class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 text-slate-900 transition-all">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 ml-1">Description</label>
                <textarea name="description" rows="3" 
                    class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 text-slate-900 transition-all">{{ $task->description }}</textarea>
            </div>

            <div class="flex flex-col gap-4 pt-4">
                <button type="submit" class="w-full bg-blue-600 hover:bg-emerald-700 text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-emerald-100 transition-all active:scale-[0.98]">
                    Update Task
                </button>
                <a href="{{ route('tasks.index') }}" class="text-center text-slate-400 hover:text-slate-600 font-semibold transition-colors">
                    Cancel Changes
                </a>
            </div>
        </form>

    </div>

</body>
</html>