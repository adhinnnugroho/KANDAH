<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicButton extends Component
{
    public $background;
    /**
     * Create a new component instance.
     */
    public function __construct($background = 'bg-black')
    {
        $this->background = $background;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.basic-button');
    }
}
