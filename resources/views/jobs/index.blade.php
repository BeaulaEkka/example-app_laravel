<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <form action="{{ route('jobs.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search for jobs">
        <button type="submit">Search</button>
    </form>

    <div class="space-y-5">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
                class="block hover:bg-gray-200 p-4 py-6 border border-gray-200 rounded-lg ">
                <div class="text-blue-600 font-bold text-2xl">{{ $job->employer->name }}</div>
                <div><strong>{{ $job['title'] }}</strong>: Company {{ $job['company'] }}</div>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
