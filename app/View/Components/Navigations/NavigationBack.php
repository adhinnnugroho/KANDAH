<?php

namespace App\View\Components\Navigations;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationBack extends Component
{
    public $title, $icons;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $icons)
    {
        $this->title = $title;
        $this->icons = $icons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigations.navigation-back');
    }
}
