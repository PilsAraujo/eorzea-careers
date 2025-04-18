<x-layout>
    <x-page-heading>Edit Job: {{ $job->title }}</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{$job->id}}">
        @method('PATCH')
        <x-forms.input label="Title" name="title" placeholder="Warrior" value="{{ old('title', $job->title) }}"/>
        <x-forms.input label="Salary" name="salary" placeholder="30,000 Gil" value="{{ old('salary', $job->salary) }}" />
        <x-forms.input label="Location" name="location" placeholder="Eastern La Noscea" value="{{ old('location', $job->location) }}"/>

            <x-forms.select label="Schedule" name="schedule">
                <option value="Part Time" {{ old('schedule', $job->schedule) == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                <option value="Full Time" {{ old('schedule', $job->schedule) == 'Full Time' ? 'selected' : '' }}>Full Time</option>
            </x-forms.select> 

        <x-forms.textarea label="Description" name="description">{{ old('description', $job->description) }}</x-forms.textarea>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" :checked="old('featured', $job->featured) == 1" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="tank, axe, blue" value="{{ old('tags', $job->tags->pluck('name')->join(', ')) }}"/>

        

        <div class="mt-6 flex items-center justify-between gap-x-6">
            
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-400">Cancel</a>
            <x-forms.button>Update</x-forms.button>
            </div>

            <div class="flex-items-center">
              <button form="delete-form" class="text-red-500 font-bold">Delete</button>
            </div>
        </div>

    </x-forms.form>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
      </form> 
</x-layout>