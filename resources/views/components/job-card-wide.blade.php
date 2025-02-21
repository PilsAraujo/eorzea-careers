@props(['job'])

<x-panel class="flex gap-x-6">
    
    <div>
        <x-faction-logo :faction="$job->faction" />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="" class="self-start text-sm text-gray-500">{{ $job->faction->name }}</a>
        <a href="/jobs/{{ $job['id'] }}" target="_blank">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            
                {{ $job->title }}
                       
        </h3>
            <p class="text-sm text-gray-500 mt-auto">{{ $job->salary }}</p>
        </a>
       
    </div>
    
    <div>
        @foreach ($job->tags as $tag)
            <x-tag :$tag />           
        @endforeach
    </div>

</x-panel>