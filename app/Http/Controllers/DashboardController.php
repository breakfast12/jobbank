<?php
namespace App\Http\Controllers;

use App\Models\JobCandidate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function myApplications()
    {
        $user = Auth::user();

        $myApplications = JobCandidate::where('candidate_id', $user->id)->orderByDesc('id')->paginate(10);

        return view('dashboard.my_applications', compact('myApplications'));
    }

    public function myApplicationDetails(JobCandidate $jobCandidate)
    {
        $user = Auth::user();

        if ($jobCandidate->candidate_id != $user->id) {
            abort(403);
        }

        return view('dashboard.my_application_details', compact('jobCandidate'));
    }
}
