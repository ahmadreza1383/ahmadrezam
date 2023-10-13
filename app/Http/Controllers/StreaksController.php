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
        $projects = Project::with('streaks')->get();

        $startDate = Streak::STARTDATE;
        $yearStart = Streak::STARTYEAR;
        $endDate = date('Y/m/d');
        $listOfDaysPerYear = (new AhmadrezamStreak)->listOfDaysPerYear($yearStart);

        return view('streaks.index', compact('projects', 'startDate', 'endDate', 'listOfDaysPerYear'));
    }
}
