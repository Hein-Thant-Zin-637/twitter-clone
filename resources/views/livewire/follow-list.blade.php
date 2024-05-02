<div>
    @foreach ($users as $user)
    @if ($loop->index > 3)
        @break
    @endif
    @if (auth()->user()?->hasFollow($user->id))
        @continue
    @endif
    @if ($user->id == auth()->user()->id)
        @continue
    @endif
    <div class="w-100 d-flex justify-content-between align-items-center gap-2 w-auto rounded-pill"
        style="padding: 0.6rem">
        <div class="d-flex flex-row gap-3">
            <button type="button" onclick="event.preventDefault();window.location='{{ route('profile',$user->user_name) }}'"  class="info_author_photo bg-gray-100 border-0 pl-2 pt-2">
                <img src="{{ $user->profile ?? '/profile_default_image.jpg' }}" alt=""
                    class="rounded-pill" style="widh: 50px; height: 50px;">
            </button>
            <div class="rounded-pill d-flex flex-column">
                <a href="{{ route('profile',$user->user_name) }}"
                    class="fs-5 font-weight-bold text-decoration-none text-dark">{{ $user->name }}</a>
                <p class="m-0 text-muted">{{ $user->user_name }}</p>
            </div>
        </div>
        <div>
            <livewire:follow-button :user="$user" :key="$user->id">
        </div>
    </div>
@endforeach
</div>
