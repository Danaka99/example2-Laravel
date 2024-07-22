<x-layout>
    <x-slot:heading> 
        Home Page
    </x-slot:heading>

    @foreach
<li><strong>{{$job['title']}}:</strong>pays {{$job['salary']}}per year.</li>
    @endforeach
    
<h1>hello from the Home page</h1>
</x-layout>