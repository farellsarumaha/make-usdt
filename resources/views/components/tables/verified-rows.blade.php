@props([
    'verified'
])

<div class="flex justify-center items-center">
    @if($verified)
        <span class="bg-green-600 w-full text-center text-white rounded-lg py-1 text-xs font-semibold">Verified</span>
    @else
        <span class="bg-red-600 w-full text-center text-white rounded-lg py-1 text-xs font-semibold">Not Verified</span>
    @endif
</div>
