<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TodoList;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class TodoListComponent extends Component
{
    public TodoList $list;
    #[Validate('required|min:2')]
    public string $newTask = '';

    public function mount(TodoList $list)
    {
        $this->list = $list;
    }

    public function addTask()
    {
        $this->validate();
        $task = new Task();
        $task->label = $this->newTask;
        $task->completed = false;
        $task->todo_list_id = $this->list->id;
        $task->save();
        $this->newTask = '';
    }

    #[On('task-toggled')]
    public function render()
    {
        return view('livewire.todo-list');
    }
}
