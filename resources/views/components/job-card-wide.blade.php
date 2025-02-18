@props(['job'])

<x-panel class="flex gap-x-6">
    
    <div>
        <x-faction-logo />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="" class="self-start text-sm text-gray-500">{{ $job->faction->name }}</a>
        
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>            
        </h3>
            <p class="text-sm text-gray-500 mt-auto">{{ $job->salary }}</p>
       
    </div>
    
    <div>
        @foreach ($job->tags as $tag)
            <x-tag :$tag />           
        @endforeach
    </div>

</x-panel>