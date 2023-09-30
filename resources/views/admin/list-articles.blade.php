<x-main>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-center">Is_Accepted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($articles as $article)
                    <tr>
                        <td><i class="fa-solid fa-hashtag"></i> {{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td class="text-center">

                            @if($article->is_accepted)
                            <p class="text-success"><i class="fa-solid fa-check"></i></i></p>
                            @elseif($article->is_accepted == null)
                            <p class="text-danger"><i class="fa-solid fa-check"></i></i></p>
                            @else
                            <p class="text-warning"><i class="fa-solid fa-check"></i></i></p>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('accept', $article)}}" class="btn btn-danger">click</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-main>