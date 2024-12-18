<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $navbar;
    /**
     * Create a new component instance.
     */
    public function __construct($navbar = null)
    {
        $this->navbar = $navbar;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
