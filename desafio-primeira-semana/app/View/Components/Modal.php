<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $id;
    public ?string $message;
    public function __construct(string $id, string $message = null)
    {
        $this->id = $id;
        $this->message = $message;
    }
    public function render()
    {
        return view('components.modal');
    }
}
