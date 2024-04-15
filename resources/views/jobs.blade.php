<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <h1>Jobs Listings</h1>
    <ul>
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}">
                <li class="hover:text-sky-700 "><strong>{{ $job['title'] }}</strong>: Company {{ $job['company'] }}</li>
            </a>
        @endforeach
    </ul>
</x-layout>
