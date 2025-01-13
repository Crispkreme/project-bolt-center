<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableTopHead extends Component
{
    public $title;
    public $subtitle;
    public $addTitleText;
    public $importTitleText;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $subtitle, $addTitleText, $importTitleText)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->addTitleText = $addTitleText;
        $this->importTitleText = $importTitleText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-top-head');
    }
}
