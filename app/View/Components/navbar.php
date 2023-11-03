<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    public $nav;
    public $nav2;

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        if (auth()->check()) {
            $this->nav =
                [
                    route('articles.index') => 'Articles',
                    route('articles.create') => 'Add Articles',
                    route('admin.create-user') => 'Create-User',
                    route('admin.create-client') => 'Create-Client',
                    route('admin.create-category') => 'Create-Category',
                    route('months.all') => 'All Months',

                ];
            $this->nav2 =
                [
                    route('months.january') => 'January',
                    route('months.february') => 'February',
                    route('months.march') => 'March',
                    route('months.april') => 'April',
                    route('months.may') => 'May',
                    route('months.june') => 'June',
                    route('months.july') => 'July',
                    route('months.august') => 'August',
                    route('months.september') => 'September',
                    route('months.october') => 'October',
                ];
        } else {
            $this->nav =
                [
                    route('articles.index') => 'Articles',
                    route('months.all') => 'All Months',

                ];
            $this->nav2 =
                [
                    route('months.january') => 'January',
                    route('months.february') => 'February',
                    route('months.march') => 'March',
                    route('months.april') => 'April',
                    route('months.may') => 'May',
                    route('months.june') => 'June',
                    route('months.july') => 'July',
                    route('months.august') => 'August',
                    route('months.september') => 'September',
                    route('months.october') => 'October',
                ];
        }


        return view('components.navbar');
    }
}
