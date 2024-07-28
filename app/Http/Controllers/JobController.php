<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
    $jobs = Job::with('employer')->Latest()->simplePaginate(50);

    return view('jobs.index',[
    'jobs' => $jobs
    ]);
    }



    public function create()
    {
    return view('jobs.create');
    }



    public function show(Job $job)
    {
    return view('jobs.show', ['job' => $job]);
    }



    public function store()
    {
         request()->validate([
         'title' => ['required','min:4'],
         'salary' => ['required']
    ]);
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
    }


    
    public function edit(Job $job)
    {
     return view('jobs.edit', ['job' => $job]);
    }




    public function update(Job $job)
    {
     request()->validate([
        'title' => ['required', 'min:4'],
        'salary' => ['required']
    ]);

    // Find the job or fail
   // $job = Job::findOrFail($id);
    // Update the job
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    // Redirect to the job page
    return redirect('/jobs/' . $job->id);
    } 

 
    public function destroy(Job $job)
    {
      $job->delete();

    //redirect
    return redirect('/jobs');
    }
    
}

