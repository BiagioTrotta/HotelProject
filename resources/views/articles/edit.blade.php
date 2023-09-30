<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-center mt-5">{{ $title }}</h2>

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" placeholder="title" required>
                        <label for="title">Title</label>
                        @error('title')
                        <div class="fw-bolg text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="category_id" name="category_id" aria-label="Floating label select example" required>
                            <option selected disabled>Open menu category</option>
                            @foreach($categories as $category)
                            @if($article->category)
                            <option value="{{ $category->id }}" @selected($category->id === $article->category->id)>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        <label for="category_id">Selected</label>
                        @error('category_id')
                        <div class="fw-bolg text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $article->description ?? '') }}" placeholder="description" require>
                        <label for="description">Description</label>
                        @error('description')
                        <div class="fw-bolg text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="body" id="body" placeholder="Leave a comment here" style="height: 15rem;">{{ old('body', $article->body ?? '') }}</textarea>
                        <label for="body">Body</label>
                        @error('body')
                        <div class="fw-bolg text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mb-3">
                        <button class="btn btn-dark" type="submit">
                            <i class="fa-solid fa-pen-to-square"></i> {{ $title }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>