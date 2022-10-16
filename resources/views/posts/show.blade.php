<x-app-layout :title="$post->seo_title">
    @push('meta')
        <meta name="description" content="{{ $post->meta_description }}">
    @endpush
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-semibold mb-4">{{ $post->title }}</h1>
        <p>{{ $post->excerpt }}</p>
        <figure class="mb-4">
            <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}" class="aspect-[3/1] object-cover">
        </figure>
        <div>
            {!! $post->body !!}
        </div>
    </div>
</x-app-layout>
