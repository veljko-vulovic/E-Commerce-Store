<?php

namespace App\View\Components\Slider;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorySlider extends Component
{
    public $categories;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider.category-slider');
    }
}
