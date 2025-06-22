<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Locale extends Component
{
    public array $availableLocales;

    public function __construct()
    {
        $this->availableLocales = ['it', 'en', 'es'];
    }

    public function render()
    {
        return view('components.locale');
    }
}