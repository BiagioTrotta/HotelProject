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

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" placeholder="title" required>
                        <label for="title">Title</label>
                        @error('title')
                        <div class="fw-bold text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="category_id" name="category_id" aria-label="Floating label select example" required>
                            <option selected disabled>Open menu category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="category_id">Selected</label>
                        @error('category_id')
                        <div class="fw-bold text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $article->description ?? '') }}" placeholder="description" require>
                        <label for="description">Description</label>
                        @error('description')
                        <div class="fw-bold text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label for="file" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="body" id="body" rows="10" placeholder="Leave a comment here" style="height: 15rem;">{{ old('body', $article->body ?? '') }}</textarea>
                        <label for="body">Body</label>
                        @error('body')
                        <div class="fw-bold text-danger">{{ $message }}</div>
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