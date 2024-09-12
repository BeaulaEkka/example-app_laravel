<x-layout>
    <x-slot:heading>Post a Job</x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Please fill in the job details.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Teacher" required />
                        </div>
                        <x-form-error name="title" />
                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="salary" id="salary" placeholder="5000" required />
                        </div>
                        <x-form-error name="salary" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="company">Company</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="company" id="company" placeholder="IKEA" required />
                        </div>
                        <x-form-error name="company" />
                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="title">Job Description</x-form-label>
                        <div class="mt-2">
                            <x-form-textarea type="text" name="description" id="description"
                                placeholder="Your text here" required>
                            </x-form-textarea>
                        </div>
                        <x-form-error name="description" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="title">Job Requirements</x-form-label>
                        <div class="mt-2">
                            <x-form-textarea placeholder="Job requirements " type="text" name="requirements"
                                id="requirements" required>
                            </x-form-textarea>
                        </div>
                        <x-form-error name="requirements" />
                    </x-form-field>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <x-form-button>
                    Save
                </x-form-button>
            </div>
    </form>

</x-layout>
