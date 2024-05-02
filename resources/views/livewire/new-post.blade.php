<div class="my-3">
    <form wire:submit.prevent="storePost" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="info_author_photo p-1 col-1">
                
                <img src=" {{auth()->user()->profile ?? '/profile_default_image.jpg'}}" alt="..."
                    style="width:3rem;height:3rem" class="mr-3 rounded-circle">
            </div>
            <div class="mb-3 col-11">
                <textarea wire:model="description" class="description form-control shadow-none border-0" rows="5"
                    placeholder="What is happening?!"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                @if ($images)
                    <div class="d-flex flex-row">
                        @foreach ($images as $img)
                           <div class="position-relative w-25">
                                <img class="img-fluid w-100 my-2 contenedor-img" src="{{ $img->temporaryUrl() }}">
                                <button class="position-absolute top-0 end-0 btn-close shadow-none" wire:click.prevent="removeImage({{ $loop->index }})"></button>
                           </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-between w-100">
                <div class="d-flex flex-row gap-4 ">
                    <label for="image"><img src="/svg/image.svg" alt="image" style="width: 23px; height: 23px; "></label>
                    <input type="file" id="image" class="image" multiple wire:model="images"
                        style="display: none">
                    
                </div>
                <div>
                    <button type="submit" class="btn btn-primary rounded-pill"
                        style="font-weight: bold; width: 70px">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
