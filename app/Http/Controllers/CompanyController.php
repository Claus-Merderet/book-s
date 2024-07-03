<?php

namespace App\Http\Controllers;

use App\Data\CompanyData;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Company/Index', [
            'companies' => CompanyData::collect(Company::all()),
        ]);
    }

    public function show(Company $company): Response
    {
        return Inertia::render('Company/Show', [
            'company' => CompanyData::from($company)
        ]);
    }

    public function edit(Company $company): Response
    {
        return Inertia::render('Company/Edit', [
            'company' => CompanyData::from($company)
        ]);
    }

    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $validatedData = $request->validated();
        $company->update($validatedData);
        return Redirect::back();
    }
}
