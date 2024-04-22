<div>
    @if (auth()->user()
            ?->hasFollow($user->id))
        <button class="btn btn-outline-dark font-weight-bold rounded-pill" wire:click="unfollow({{ $user->id }})">UnFollow</button>
    @else
        <button class="btn btn-dark font-weight-bold rounded-pill" wire:click="follow({{ $user->id }})">Follow</button>
    @endif
</div>
