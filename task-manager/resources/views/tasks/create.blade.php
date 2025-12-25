<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-200 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-[2.5rem] shadow-2xl shadow-blue-400/30 p-10 border border-white">
        
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Create Task</h2>
            <p class="text-slate-500 mt-2 font-medium">Add a new goal to your list.</p>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
            @csrf 
            
            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700 ml-1">Task Title</label>
                <input type="text" name="title" required placeholder="What needs to be done?" 
                    class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 text-slate-900 placeholder:text-slate-400 transition-all outline-none">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-slate-700 ml-1">Description (Optional)</label>
                <textarea name="description" rows="3" placeholder="Add more details..." 
                    class="w-full bg-slate-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 text-slate-900 placeholder:text-slate-400 transition-all outline-none"></textarea>
            </div>

            <div class="flex flex-col gap-4 pt-2">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-indigo-200 transition-all active:scale-[0.98]">
                    Save Task
                </button>
                <a href="{{ route('tasks.index') }}" class="text-center text-slate-400 hover:text-indigo-600 font-semibold transition-colors">
                    Back to Workspace
                </a>
            </div>
        </form>

    </div>

</body>
</html>