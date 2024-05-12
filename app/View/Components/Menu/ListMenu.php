<?php

namespace App\View\Components\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListMenu extends Component
{
    public $links;
    /**
     * Create a new component instance.
     */
    public function __construct($links = null)
    {
        $this->links = $links;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.list-menu');
    }
}
