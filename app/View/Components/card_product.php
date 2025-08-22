<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card_product extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $id,
        public float $price,
        public string $photo,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card_product');
    }
}