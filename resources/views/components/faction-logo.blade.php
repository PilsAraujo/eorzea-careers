@props(['faction', 'width' => 90])

<img src="{{ asset('storage/' . $faction->logo) }}" alt="" class="rounded-xl" width="{{ $width }}">