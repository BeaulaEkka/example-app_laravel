<x-layout>
    <x-slot:heading>Edit a Job : {{ $job->title }}</x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit a Job</h2>


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Teacher" required value="{{ $job ? $job->title : '' }}">
                            </div>
                        </div>
                        <div class="text-red-500 italic mt-2 text-xs">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <input type="text" name="salary" id="salary"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="5000" required value="{{ $job ? $job->salary : '' }}">

                            </div>
                        </div>
                        <div class="text-red-500 italic mt-2 text-xs">
                            @error('salary')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-span-full">
                        <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Company</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <input type="text" name="company" id="company"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="IKEA" required value="{{ $job ? $job->company : '' }}">

                            </div>
                        </div>
                        <div class="text-red-500 italic mt-2 text-xs">
                            @error('company')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Job
                            Description</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <textarea type="text" name="description" id="description"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Job description" required>{{ $job ? $job->description : '' }}
                                    </textarea>
                            </div>
                        </div>
                        <div class="text-red-500 italic mt-2 text-xs">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="requirements" class="block text-sm font-medium leading-6 text-gray-900">Job
                            Requirements</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                <textarea type="text" name="requirements" id="requirements"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    required>{{ $job ? $job->requirements : '' }}</textarea>
                            </div>
                        </div>
                        <div class="text-red-500 italic mt-2 text-xs">
                            @error('requirements')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>

                </div>

            </div>



        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex justify-center">
                <button form="delete-form" type="submit"
                    class="bg-red-500 px-3 py-2 text-sm font-bold rounded-md text-white hover:bg-red-600">Delete</button>
            </div>
            <div class="flex items-center gap-x-6"><a href="/jobs/{{ $job->id }}"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>



        </div>
    </form>
    <form method="POST" action="/jobs/{{ $job->id }}" class="hidden" id="delete-form">
        @csrf
        @method('DELETE')

    </form>

</x-layout>
