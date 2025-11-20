<?php

namespace App\Livewire\Website;

use Livewire\Component;

class Application extends Component
{
    public $termsAndConditions = false;

    public function viewTermsAndCondtions() {
        $this->termsAndConditions = !$this->termsAndConditions;
    }
    public function render()
    {
        return view('livewire.website.application');
    }
}
