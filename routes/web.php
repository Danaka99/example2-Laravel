<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job; 

Route::get('/home', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
//index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->Latest()->simplePaginate(50);

    return view('jobs.index',[
    'jobs' => $jobs
    ]);
});  
//create
Route::get('/jobs/create', function() {
   return view('jobs.create');
}); 
//show
Route::get('/jobs/{id}', function($id) {
   $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
}); 
//store
Route::post('/jobs', function() {
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
});
//edit
Route::get('/jobs/{id}/edit', function($id) {
   $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
}); 
//update
Route::patch('/jobs/{id}', function($id) {
    // Validate
    request()->validate([
        'title' => ['required', 'min:4'],
        'salary' => ['required']
    ]);

    // Find the job or fail
    $job = Job::findOrFail($id);

    // Update the job
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    // Redirect to the job page
    return redirect('/jobs/' . $job->id);
});

//destroy
Route::delete('/jobs/{id}', function($id) {
    //authorize (on hold)
    //delete the job
    Job::findOrFail($id)->delete();

    //redirect
    return redirect('/jobs');
}); 
 

