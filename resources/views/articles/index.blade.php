<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
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
            </div>
            @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card mb-5">
                    <img src="{{ Storage::url($article->image) ?? '/' }}" style="height:15rem" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->description}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><strong>Author:</strong> {{$article->user->name}}</p>
                        <a href="{{route('articles.show', $article)}}" class="btn btn-outline-dark"><i class="fas fa-eye"></i> View</a></a>
                        <a href="{{route('articles.edit', $article)}}" class="btn btn-outline-warning mx-2"><i class="fas fa-edit"></i> Edit</a></a>
                        <form action="{{route('articles.destroy', $article)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-main>