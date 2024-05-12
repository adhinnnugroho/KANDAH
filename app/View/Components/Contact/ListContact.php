<?php

namespace App\View\Components\Contact;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListContact extends Component
{
    public $image, $name, $info;
    /**
     * Create a new component instance.
     */
    public function __construct($image = null, $name = null, $info = null)
    {
        $this->image = $image;
        $this->name = $name;
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact.list-contact');
    }
}
