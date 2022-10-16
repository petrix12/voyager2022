<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-semibold text-center mb-8">{{ setting('site.title') }}</h1>
        <ul class="space-y-8">
            @foreach ($posts as $post)
                <li>
                    <article>
                        <h2 class="text 2xl font-semibold">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        <figure>
                            <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}" class="aspect-[3/1] object-cover">
                        </figure>
                        <p>{{ $post->excerpt }}</p>
                    </article>
                </li>
            @endforeach
        </ul>
        {{ $posts->links() }}
    </div>
</x-app-layout>
