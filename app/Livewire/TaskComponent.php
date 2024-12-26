<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class TaskComponent extends Component
{
    public $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function toggleTask()
    {
        $this->task->completed = !$this->task->completed;
        $this->task->save();
        $this->dispatch('task-toggled', $this->task->id);
    }

    public function deleteTask()
    {
        $this->task->delete();
        $this->dispatch('task-toggled');
    }

    public function render()
    {
        return view('livewire.task');
    }
}
