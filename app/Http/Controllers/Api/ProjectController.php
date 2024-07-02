<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Funzione Index

    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    // Funzione Show

    public function show(string $slug)
    {
        $project = Project::with(['technologies', 'category'])->where('slug', $slug)->first();
        
        if (!$project) {
            return response()->json([], 404);
        }
        return response()->json([
            'results' => $project,
            'success' =>true
        ]);
    }
}
