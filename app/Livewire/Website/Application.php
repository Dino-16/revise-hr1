<?php

namespace App\Livewire\Website;

use Livewire\Component;

class Application extends Component
{
    public $applicantLastName;
    public $applicantFirsttName;
    public $applicantMiddleName;
    public $applicantSuffixName;
    public $applicantAddress;
    public $applicantEmail;
    public $applicantPhone;
    public $applicantResumeFile;
    public $agreedToTerms;


    public $termsAndConditions = false;

    public function viewTermsAndCondtions() {
        $this->termsAndConditions = !$this->termsAndConditions;
    }
    public function render()
    {
        return view('livewire.website.application');
    }
}
