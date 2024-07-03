<?php

namespace App\Http\Controllers;

use App\Data\CompanyData;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BranchController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Branch/Create');
    }

    public function store()
    {
        
    }
}
