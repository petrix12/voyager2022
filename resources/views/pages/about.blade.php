<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-4xl font-semibold text-center mb-4">{{ $page->title }}</h1>
        <div class="mb-4">
            {!! $page->body !!}
        </div>
        @if($page->image)
            <figure>
                <img src="{{ Voyager::image($page->image) }}" alt="{{ $page->title }}" class="aspect-[4/3] object-cover">
            </figure>
        @endif>
    </div>
</x-app-layout>
