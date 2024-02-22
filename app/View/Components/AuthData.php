<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthData extends Component
{
    public $title;
    public $url;
    public $buttonText;
    public $linkText;
    public $linkUrl;

    public function __construct($title, $url, $buttonText, $linkText, $linkUrl)
    {
         $this->title = $title;
        $this->url = $url;
        $this->buttonText = $buttonText;
        $this->linkText = $linkText;
        $this->linkUrl = $linkUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-data');
    }
}
