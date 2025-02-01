<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $company = Company::with(['employer'])->where('employer_id', $user->id)->first();

        if (! $company) {
            return redirect()->route('admin.company.create');
        }

        return view('admin.company.index', compact('company'));
    }
}
