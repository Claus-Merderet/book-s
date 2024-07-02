<?php

namespace App\Http\Controllers;

use App\Data\CompanyData;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Company/Index', [
            'companies' =>  CompanyData::collect(Company::all()),
        ]);
    }

    public function show(Company $company): Response
    {
        return Inertia::render('Company/Show', [
            'company' => CompanyData::from($company)
        ]);
    }
}
