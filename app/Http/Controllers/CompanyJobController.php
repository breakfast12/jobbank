<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyJobRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompanyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $myCompany = Company::where('employer_id', $user->id)->first();

        if ($myCompany) {
            $companyJobs = CompanyJob::with(['category'])->where('company_id', $myCompany)->paginate(10);
        } else {
            $companyJobs = collect();
        }

        return view('admin.company_jobs.index', compact('companyJobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $myCompany = Company::where('employer_id', $user->id)->first();
        if (! $myCompany) {
            return redirect()->route('admin.company.create');
        }

        $categories = Category::all();

        return view('admin.company_jobs.create', compact('categories', 'myCompany'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyJobRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath          = $request->file('thumbnail')->store('thumbnails/' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug']    = Str::slug($validated['name']);
            $validated['is_open'] = true;

            $newJob = CompanyJob::create($validated);

            if (! empty($validated['responsibilities'])) {
                foreach ($validated['responsibilities'] as $responsibility) {
                    $newJob->responsibilities()->create([
                        'name' => $responsibility,
                    ]);
                }
            }

            if (! empty($validated['qualifications'])) {
                foreach ($validated['qualifications'] as $qualification) {
                    $newJob->qualifications()->create([
                        'name' => $qualification,
                    ]);
                }
            }
        });

        return redirect()->route('admin.company_jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyJob $companyJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyJob $companyJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyJob $companyJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyJob $companyJob)
    {
        //
    }
}
