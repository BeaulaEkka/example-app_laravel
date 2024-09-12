<x-layout>
    <x-slot:heading>Job Details</x-slot:heading>
    <h1>Job Description</h1>
    <h2 class="text-xl"><strong>{{ $job->title }}</strong></h2>
    <h2>{{ $job->company }}</h2>
    <h2 class="font-bold my-3">Job Description</h2>
    <p>{{ $job->description }}</p>
    <h2 class="font-bold my-3">Job Requirements</h2>
    <p>{{ $job->requirements }}</p>
    @can('edit', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan
</x-layout>
