<x-layout>
    <x-page-heading>
        Job
    </x-page-heading>
    
    <h2>{{ $job->title }} </h2>


    <p>
        This job pays {{ $job->salary }} per year.
    </p>

    <p class="mb-4">
        {{ $job['description'] }}
    </p>

    @can('edit', $job)
        <a href="/jobs/{{ $job->id }}/edit"><x-forms.button>Edit Job</x-forms.button></a>
    @endcan
</x-layout>
    