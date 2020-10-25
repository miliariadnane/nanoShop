<?php

namespace App\View\Components;

use Illuminate\View\Component;

class head extends Component
{
    public $href1;
    public $href2;
    public $title1;
    public $title2;
    public $title3;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href1 , $href2 = null, $title1, $title2 = null, $title3 = null)
    {
        $this->href1 = $href1;
        $this->href2 = $href2;
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
        return view('components.head');
    }
}
