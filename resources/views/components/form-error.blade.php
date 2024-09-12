@props(['name'])

@error($name)
    <p class="text-red-500 italic mt-2 text-xs">{{ $message }}</p>
@enderror
