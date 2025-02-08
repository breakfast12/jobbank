<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanyJob;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $jobs       = CompanyJob::with(['category', 'company'])->latest()->take(6)->get();

        return view('front.index', compact('jobs', 'categories'));
    }

    public function details(CompanyJob $companyJob)
    {
        $jobs = CompanyJob::with(['category', 'company'])
            ->where('id', '!=', $companyJob->id)
            ->InRandomOrder()
            ->take(4)
            ->get();

        return view('front.details', compact('companyJob', 'jobs'));
    }
}
