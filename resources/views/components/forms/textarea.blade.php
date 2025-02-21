@props(['label', 'name', 'rows'])

@php
    $defaults = [
        'type' => 'textarea',
        'id' => $name,
        'name' => $name,
        'rows' => 3,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}>{{ $slot}}</textarea>
    <p class="text-sm/6 text-gray-600">Write a few sentences about the job.</p>
</x-forms.field>