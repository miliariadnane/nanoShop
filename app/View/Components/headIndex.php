<?php

namespace App\View\Components;

use Illuminate\View\Component;

class headIndex extends Component
{
    public $href1;
    public $title1;
    public $title2;
    public $title3;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href1 , $title1, $title2 , $title3)
    {
        $this->href1 = $href1;
        $this->title1 = $title1;
        $this->title2 = $title2;
        $this->title3 = $title3;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.head-index');
    }
}
