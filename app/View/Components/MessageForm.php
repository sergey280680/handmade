<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MessageForm extends Component
{
    public string $buttonText;
    public string $route;
    /**
     * Create a new component instance.
     */
    public function __construct($buttonText, $route)
    {
        $this->buttonText = $buttonText;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.message-form');
    }
}
