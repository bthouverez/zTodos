<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $list->title }}
        </h2>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div
            class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
            <form wire:submit.prevent="addTask" class="flex justify-between gap-2  mb-4 ">
                <div class="w-full">
                    <input wire:model="newTask" type="text" id="first_name" placeholder="{{ __('Add a new task') }}"
                           class="text-lg bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <div class="text-red-500 font-bold">@error('newTask') {{ $message }} @enderror</div>
                </div>
                <button class="flex justify-around items-center  w-12 h-12 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    <x-heroicon-m-check  class="w-8 text-white"/>

                </button>

            </form>
            <div
                class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse($list->tasks->sortBy([['completed', 'asc'], ['created_at', 'desc']]) as $task)
                    <livewire:task-component :$task :key="$task->id"/>
                @empty
                    <div class="p-4 text-center text-gray-500 dark:text-gray-400">
                        {{ __('No tasks yet') }}
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
