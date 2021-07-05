<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimpleProgress extends Component
{
    public $percent;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($percent)
    {
        $this->percent = intval($percent);
        $this->calculateColor();
    }

    public function calculateColor()
    {
        if ($this->percent >= 0 and $this->percent <= 25) {
            $this->color = '400';
        } elseif ($this->percent > 25 and $this->percent <= 50) {
            $this->color = '500';
        } elseif ($this->percent > 50 and $this->percent <= 54) {
            $this->color = '500';
        } elseif ($this->percent > 54 and $this->percent <= 75) {
            $this->color = '600';
        } else {
            $this->color = '700';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.simple-progress');
    }
}
