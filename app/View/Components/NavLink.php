<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

class NavLink extends Component
{
    public $href;
    public $active;
    /**
     * Create a new component instance.
     */
    public function __construct($href)
    {
        $this->href = $href;
        $this->active = Request::is(ltrim($href, '/'));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-link');
    }
}
