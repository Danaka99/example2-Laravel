<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/jobs', function () {
    return view('jobs',[
        'jobs' => [
        [
            'id' => 1,
           'title' => 'Director',
           'salary' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '$20,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '$10,000'
        ]
        ] 
    ]);
});
Route::get('/jobs/{id}', function ($id) {
    $jobs=[
        [
            'id' => 1,
           'title' => 'Director',
           'salary' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '$20,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '$10,000'
        ]
        
    ];
    
    $job= \Illuminate\Support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    dd($job);   
    return view('jobs');
});
