<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Package extends Component
{
    public $title;
    public $duration;
    public $amount;
    public $packageId;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $packageId, $duration, $amount, $image)
    {
        $this->title = $title;
        $this->packageId = $packageId;
        $this->duration = $duration;
        $this->amount = $amount;
        $this->image = $image;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.package');
    }
}