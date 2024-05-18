<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimpleInput extends Component
{
    public $type, $label, $error;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'text', $label = null, $error = null)
    {
        $this->type = $type;
        $this->label = $label;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.simple-input');
    }
}
