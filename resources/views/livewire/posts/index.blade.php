<div>
    <div class="container">
        <div class="col-md-6 offset-md-4 mt-5">
            @if (session('message'))
                <div class="alert bg-dark text-center text-white">{{ session('message') }}</div>
            @endif
            <div class="col-md-6 offset-3">
                <a href="/create-posts" class="btn btn-dark form-control">Add Post</a>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <select name="category" class="form-control mt-3" wire:model.lazy="category_id">
                        <h4 class="text-center mt-5">"{{ $search }}" search not found.</h4>
                        <option value="All">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach

                    </select>

                </div>
                <div class="col-md-6 mt-3">
                    <input type="text" class="form-control" placeholder="Search" wire:model.lazy="search">
                </div>
            </div>
            @foreach ($posts as $post)
                <div class="card mt-3">
                    <div class="card-header bg-dark">
                        <span class="float-end text-white"><b><i>{{ $post->category->category }}</i></b></span>
                        <h3 class="text-white">{{ $post->author }}</h3>
                    </div>
                    <div class="card-body" style="height: 200px;">
                        <h5 class="text-center" style="font-family: serif">{{ $post->title }}</h5>
                        <hr>
                        <p style="font-family: sans-serif;">{{ $post->content }}</p>
                    </div>
                    <div class="card-footer">
                        <span>Posted at: {{ $post->created_at->format('F d, Y | g:i A') }}</span>
                    </div>
                </div>
            @endforeach
            @if (!empty($search) && $posts->count() === 0)
                <h5 class="text-center mt-5"><span class="p-2" style="background-color: white;">No "{{ $search }}" post found.</span></h5>
            @elseif($posts->count() === 0)
                <h5 class="text-center mt-5"><span class="p-2" style="background-color: white;">No post for now.</span></h5>
            @endif
            
        </div>
        <div class="d-flex justify-content-center mt-3">{{$posts->links()}}</div>
    </div>
</div>
