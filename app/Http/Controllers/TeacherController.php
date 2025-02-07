<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Teacher::query();

        // Search filters
        $searchColumns = ['name', 'email', 'phone', 'expertise', 'location'];
        foreach ($searchColumns as $column) {
            if ($request->has($column)) {
                $query->where($column, 'like', '%' . $request->input($column) . '%');
            }
        }

        // Salary range filter
        if ($request->has(['min_salary', 'max_salary'])) {
            $query->whereBetween('salary', [
                $request->min_salary,
                $request->max_salary
            ]);
        }

        // Sorting
        if ($request->has('sort')) {
            $sortParams = explode('_', $request->sort);
            if (count($sortParams) === 2 && in_array($sortParams[1], ['asc', 'desc'])) {
                $query->orderBy($sortParams[0], $sortParams[1]);
            }
        }

        // Pagination
        $perPage = $request->input('per_page', 10);
        return $query->paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
