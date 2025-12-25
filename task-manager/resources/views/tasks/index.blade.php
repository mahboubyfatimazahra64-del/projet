<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-200 min-h-screen"> 
    <div class="max-w-4xl mx-auto pt-16 px-4">
        
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Workspace</h1>
                <p class="text-slate-600 mt-1 font-medium">Keep track of your daily goals.</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-bold shadow-xl shadow-indigo-400/30 transition-all active:scale-95">
                + New Task
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-blue-300/50 border border-white overflow-hidden">
            <ul class="divide-y divide-slate-100">
                @forelse($tasks as $task)
                    <li class="p-6 flex items-center justify-between hover:bg-slate-50/80 transition-all">
                        
                        <div class="flex items-center gap-5">
                            <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex items-center">
                                @csrf @method('PUT')
                                <input type="checkbox" onChange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }} 
                                    class="w-6 h-6 rounded-full border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer transition-all">
                                <input type="hidden" name="title" value="{{ $task->title }}">
                                <input type="hidden" name="is_completed" value="{{ $task->is_completed ? 0 : 1 }}">
                            </form>

                            <div>
                                <h3 class="font-bold text-lg {{ $task->is_completed ? 'line-through text-slate-400' : 'text-slate-800' }}">
                                    {{ $task->title }}
                                </h3>
                                @if($task->description)
                                    <p class="text-sm text-slate-500 mt-0.5">{{ $task->description }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('tasks.edit', $task) }}" 
                               class="flex items-center gap-1 bg-blue-50 text-blue-600 px-4 py-2 rounded-xl text-sm font-bold hover:bg-blue-600 hover:text-white transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                            
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button class="flex items-center gap-1 bg-red-50 text-red-600 px-4 py-2 rounded-xl text-sm font-bold hover:bg-red-600 hover:text-white transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="p-20 text-center">
                        <div class="inline-block p-4 rounded-full bg-slate-50 mb-4">
                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <p class="text-slate-400 italic text-lg">Your workspace is clear. Add a new task!</p>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</body>
</html>