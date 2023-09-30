<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Article Details</h1>
                <div class="card">
                    <img src="{{ Storage::url($article->image) ?? '/' }}" alt="">
                    <div class="card-body">
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            {{$article->category->name}}
                        </h6>
                        <p class="card-text">{{ $article->description }}</p>
                        <hr>
                        <p class="card-text">{{ $article->body }}</p>
                    </div>
                </div>
                <div class="my-3 text-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-dark"><i class="fa-solid fa-arrow-rotate-left"></i> Back to Articles</a>
                </div>
            </div>
        </div>
    </div>
</x-main>