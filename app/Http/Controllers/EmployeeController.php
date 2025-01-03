<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Employees/Employee');
    }

    public function createEmployee(): Response
    {
        return Inertia::render('Admin/Employees/CreateEmployee');
    }

    public function updateOrCreateEmployee(Request $request): Response
    {
        dd($request);
    }
}
