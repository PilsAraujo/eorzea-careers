@props(['job'])

<x-panel class="flex flex-col text-center ">
    
    <div class="self-start text-sm">{{ $job->faction->name }}</div>
    
    <a href="/jobs/{{ $job['id'] }}">
        <div class="py-8 font-bold">
            <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            
                {{ $job->title }}
                     
            </h3>
            <p class="text-sm mt-4">{{ $job->salary }}</p>
        </div>
    </a>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small"/>           
            @endforeach
        </div>

        <x-faction-logo :faction="$job->faction" :width="42" />
    </div>


</x-panel>