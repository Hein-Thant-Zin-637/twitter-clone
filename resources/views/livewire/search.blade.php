<div class="mt-2 px-5 w-100 ">
    <div class="d-flex flex-row text-center mb-3 w-100  bg-gray-100 align-items-center rounded-pill">
        <span class="ms-3 border-right-0 border-0" id="basic-addon1"><img class="search-icon"
                src="/svg/search.svg" alt="" style="width: 23px; height: 23px;"></span>
        <input wire:model.debounce.300ms="search"  type="search" class="form-control shadow-none border-0 bg-gray-100 rounded-pill"
            placeholder="Search" >
    </div>
    <ul>
        @foreach($posts  as $post)
            <li>{{ $post->description }}</li>
        @endforeach
    </ul>
</div>