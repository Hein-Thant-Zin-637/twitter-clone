<div>
    <form wire:submit.prevent="submitReport">
        @csrf
        <div class="row">
            <div class="info_author_photo p-1 col-1">
                <img src="{{ asset(auth()->user()->profile ?? '/profile_default_image.jpg') }}"
                    alt="..." style="width:3rem;height:3rem" class="mr-3 rounded-circle">
            </div>
            <div class="mb-3 col-11">
                <textarea onclick="event.preventDefault()" wire:model.prevent="message" class="description form-control shadow-none border-0" rows="5"
                    placeholder="Post your replay"></textarea>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill float-end"
            style="font-weight: bold; width: 80px">Report</button>
    </form>
</div>
