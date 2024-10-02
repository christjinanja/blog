<div class="card">
    {{-- here create a form to add new post --}}
    <div class="card-header">
        Modifier la publication
    </div>
    <div class="card-body">
        {{-- here we call save function --}}
        <form class="my-3" wire:submit="update">
        <div class="col-sm-10">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" wire:model="post_title" value="{{$post->post_title}}" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Titre de la publication</label>
            </div>
            {{-- show validation error here --}}
            @error('post_title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-10">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" wire:model="content" value="{{$post->content}}" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Votre message va ici..</label>
            </div>
            @error('content')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-sm-10">
            <label for="">Image</label>
            <div class="form-floating mb-3">
                <img height="80px" width="80px" src="{{ asset('storage/images/' .$post->photo) }}" alt="post image">
                <input type="file" class="form-control" placeholder="post details" wire:model="photo" id="">
            </div>
            @error('photo')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="/my/posts" wire:navigate class="btn btn-secondary">Retour</a>
        </div>
    </form>
    </div>
</div>
