<?php

namespace App\Http\Controllers;

use App\Ahmadrezam\Streak as AhmadrezamStreak;
use App\Models\Project;
use App\Models\Streak;
use Carbon\Carbon;

class StreaksController extends Controller
{
    //
    public function index()
    {
        $projects = Project::with('streaks')->where('id', 1)->first();

        // dd($projects->streaks);

        $startDate = Streak::STARTDATE;
        $yearStart = Streak::STARTYEAR;
        $endDate = date('Y/m/d');
        $listOfDaysPerYear = (new AhmadrezamStreak())
            ->listOfDaysPerMount(12, [
                'options' => [
                    'exists' => [
                        'year' => '*',
                        'mount' => [
                            8, 10, 12
                        ],
                        'days' => [
                            17, 18, 19,
                        ]
                    ],
                ],
            ]);

        dd($listOfDaysPerYear);
        return view('streaks.index', compact('projects', 'startDate', 'endDate', 'listOfDaysPerYear'));
    }
}
