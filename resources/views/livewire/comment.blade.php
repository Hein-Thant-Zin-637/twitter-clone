<div class="ms-3 comment-form">
    <form wire:submit.prevent="submitComment">
        @csrf
        <div class="row">
            <div class="info_author_photo p-1 col-1">
                <img src="{{ auth()->user()->profile ??'/profile_default_image.jpg' }}" alt="..."
                    style="width:3rem;height:3rem" class="mr-3 rounded-circle">
            </div>
            <div class="mb-3 col-11">
                <textarea onclick="event.preventDefault()" wire:model.prevent="commentText" class="description form-control shadow-none border-0" rows="4"
                    placeholder="Post your replay"></textarea>
                @error('commentText')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill float-end"
            style="font-weight: bold; width: 90px">Replay</button>
    </form>
</div>
