<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(5);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }
//--------------------------------------------
// //show
// Route::get('/jobs/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.show', ['job' => $job]);

// });
//try to do it with ROUTE BINDING
//-------------------------------------------
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
            'company' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);

        //Create
        // $job = Job::create(request()->all());
        // return redirect('/jobs');
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
            'company' => request('company'), 'description' => request('description'), 'requirements' => request('requirements'),
        ]);
        return redirect('/jobs');
    }
//-------------------------------------------------
// //edit
// Route::get('/jobs/{id}/edit', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.edit', ['job' => $job]);

// });
//------------------------------------------------
    public function edit(Job $job)
    {

//not requiredanymore because of gate in provider
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }
//authorize
        // Gate::authorize('edit-job', $job);(not required with middlewares)

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
//authorize
        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
            'company' => 'required',
            'description' => 'required',
            'requirements' => 'required']);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'company' => request('company'),
            'description' => request('description'),
            'requirements' => request('requirements'),
        ]);
        //persist
        //redirect to the jobs page

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
//authorise
//delete
        $job->delete();
        return redirect('/jobs');
//redirect
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query
        $jobs = Job::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

        return view('jobs.search', compact('jobs', 'query'));
    }
}
