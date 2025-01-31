<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AgentLayout extends Component
{
    public function render() : View
    {
        return view('layouts.agent');
    }
}
