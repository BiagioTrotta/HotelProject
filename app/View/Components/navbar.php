<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    public $nav;

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        if(auth()->check())
        {
            $this->nav =
                [
                    route('articles.index') => 'Articles',
                    route('articles.create') => 'Add Articles',
                    route('admin.create-user') => 'Create-User',
                    route('admin.create-category') => 'Create-Category',
                    route('august-days.index2') => 'August2',
                    route('september-days.index') => 'September',
                ];
        }
        else
        {
            $this->nav =
                [
                    route('articles.index') => 'Articles',
                    route('months.august') => 'August',
                    route('months.september') => 'September',
                    route('months.january') => 'January',
                    route('months.february') => 'February',
                    
                ];
        }


        return view('components.navbar');
    }
}
