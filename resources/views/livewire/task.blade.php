<div class="flex justify-between w-full text-left  px-4 py-2 text-lg font-medium dark:border-gray-600 border-b
 has-[:checked]:text-gray-500 has-[:checked]:bg-gray-800 hover:text-gray-300">
    <label for="toggle-{{ $task->id }}" class="{{ $task->completed ? 'line-through': '' }} w-full flex justify-between hover:cursor-pointer  active:text-emerald-600">
        {{ $task->label }}
        @if(!$task->completed)
            <x-heroicon-m-check class="w-6"/>
        @else
            <x-heroicon-m-arrow-left-start-on-rectangle class="w-6"/>
        @endif
    </label>
    @if($task->completed)
        <div class="flex">
            <x-heroicon-m-trash class="w-6 hover:cursor-pointer hover:text-red-500 active:text-red-600" wire:click="deleteTask" />
        </div>
    @endif
    <input type="checkbox" id="toggle-{{ $task->id }}" class="mt-1 hidden" {{ $task->completed ? 'checked': '' }}  wire:change="toggleTask()">
</div>
