<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormGroomingSchedule extends Component
{
    /**
     * Create a new component instance.
     */
    public $action, $schedule, $url;
    public function __construct($action, $schedule = '', $url)
    {
        $this->action = $action;
        $this->schedule = $schedule;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-grooming-schedule');
    }
}
