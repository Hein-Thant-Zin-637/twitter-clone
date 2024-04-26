<div class="mt-2  w-100 ">
    <div class="d-flex mx-1 flex-row text-center mb-3 w-100  bg-gray-100 align-items-center rounded-pill">
        <span class="ms-3 border-right-0 border-0" id="basic-addon1"><img class="search-icon"
                src="/svg/search.svg" alt="" style="width: 23px; height: 23px;"></span>
        <input wire:model.live="search"  type="search" class="form-control shadow-none border-0 bg-gray-100 rounded-pill"
            placeholder="Search" >
    </div>
    @if($tagList)
    {{-- tag --}}
    <div class="card border-0 rounded-4 mb-3 mt-3">
        <div class="card-header   border-0 " style="font-size:1.25rem;font-weight: 700;">Popular tags</div>
        <div class="card-body p-2 border-0" style="background-color:#f8f9fc">
            <div>
                <livewire:tag-list>
            </div>
            <div class="card-footer  border-0 text-info">Show more...</div>
        </div>
    </div>
    @endif
    <div>
        @foreach ($posts as $post)
            <livewire:post-show :post="$post" :key="$post->id">
        @endforeach
    </div>
</div>