<x-layout>
<x-slot:heading> 
       Job Listing
    </x-slot:heading>

 <ul>
    @foreach ($jobs as $job)
    <li>
        <a href="/jobs/1 ">
        <strong>{{$job['title']}}</strong> Pays {{$job['salary']}} per year.
        </a> 
    </li>
    @endforeach
 </ul>
</x-layout>