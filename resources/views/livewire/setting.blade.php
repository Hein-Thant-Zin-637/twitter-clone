<div class="d-flex w-100 mt-4 align-items-start">
    <div class="nav flex-column w-25  nav-settings  me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-email"
            type="button" role="tab" aria-controls="v-pills-email" aria-selected="true">Change Email
            </button>
        <button class="nav-link" id="v-pills-phone-tab" data-bs-toggle="pill" data-bs-target="#v-pills-phone"
            type="button" role="tab" aria-controls="v-pills-phone" aria-selected="false">Change
            Phone</button>
        <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password"
            type="button" role="tab" aria-controls="v-pills-password" aria-selected="false">Change
            Password</button>
        <button class="nav-link" id="v-pills-blocklist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-blocklist"
            type="button" role="tab" aria-controls="v-pills-blocklist" aria-selected="false">Block list</button>
        <button class="nav-link" id="v-pills-mutelist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-mutelist"
            type="button" role="tab" aria-controls="v-pills-mutelist" aria-selected="false">Mute list</button>
    </div>
    <div class="tab-content w-75 me-5" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-email" role="tabpanel"
            aria-labelledby="v-pills-email-tab" tabindex="0">
            <h2 class="mb-5">Change Emial</h2>
            <form wire:submit.prevent="changeEmail">
                @csrf
                <div class="form-floating mb-3 mt-3">
                    <input type="email" wire:model="email" value="{{auth()->user()->email ?? ''}}" class="form-control shadow-none " id="email"placeholder="Email" name="email">
                    <label for="email">Email</label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-end">Update</button>
            </form>
        </div>
        <div class="tab-pane fade" id="v-pills-phone" role="tabpanel"
            aria-labelledby="v-pills-phone-tab" tabindex="0">
            <h2 class="mb-5">Change Phone</h2>
            <form wire:submit.prevent="changePhone">
                @csrf
                <div class="form-floating mb-3 mt-3">
                    <input type="number" wire:model="phone" value="{{auth()->user()->phone ?? ''}}" class="form-control shadow-none " id="phone" placeholder="Phone" name="phone">
                    <label for="phone">Phone</label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg float-end">Update</button>
            </form>
        </div>
        <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab"
            tabindex="0">
            <h2 class="mb-5">Change Password</h2>
            <div>
                <livewire:change-password>
            </div>
        </div>
        <div class="tab-pane fade " id="v-pills-blocklist" role="tabpanel" aria-labelledby="v-pills-blocklist-tab"
            tabindex="0">
            <h2 class="mb-5">Block List</h2>
            @forelse ($blockList as $user)
                <div class="w-100 d-flex justify-content-between align-items-center gap-2 w-auto rounded-pill"
                    style="padding: 0.6rem">
                    <div class="d-flex flex-row gap-3">
                        <button type="button"
                            onclick="event.preventDefault();window.location='{{ route('profile', $user->user_name) }}'"
                            class="info_author_photo bg-gray-100 border-0 pl-2 pt-2">
                            <img src="{{ $user->profile ? '/storage/' . $user->profile : 'profile_default_image.jpg' }}"
                                alt="" class="rounded-pill" style="widh: 50px; height: 50px;">
                        </button>
                        <div class="rounded-pill d-flex flex-column">
                            <a href="{{ route('profile', $user->user_name) }}"
                                class="fs-5 font-weight-bold text-decoration-none text-dark">{{ $user->name }}</a>
                            <p class="m-0 text-muted">{{ $user->user_name }}</p>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-dark"
                            wire:click="unblock({{ $user->id }})">Unblock</button>
                    </div>
                </div>
            @empty
                <p>You Dont have Block user</p>
            @endforelse
        </div>
        <div class="tab-pane fade" id="v-pills-mutelist" role="tabpanel" aria-labelledby="v-pills-mutelist-tab"
            tabindex="0">
            <h2 class="mb-5">Mute List</h2>
            @forelse ($muteList as $user)
                <div class="w-100 d-flex justify-content-between align-items-center gap-2 w-auto rounded-pill"
                    style="padding: 0.6rem">
                    <div class="d-flex flex-row gap-3">
                        <button type="button"
                            onclick="event.preventDefault();window.location='{{ route('profile', $user->user_name) }}'"
                            class="info_author_photo bg-gray-100 border-0 pl-2 pt-2">
                            <img src="{{ $user->profile ? '/storage/' . $user->profile : 'profile_default_image.jpg' }}"
                                alt="" class="rounded-pill" style="widh: 50px; height: 50px;">
                        </button>
                        <div class="rounded-pill d-flex flex-column">
                            <a href="{{ route('profile', $user->user_name) }}"
                                class="fs-5 font-weight-bold text-decoration-none text-dark">{{ $user->name }}</a>
                            <p class="m-0 text-muted">{{ $user->user_name }}</p>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-dark"
                            wire:click="unmute({{ $user->id }})">Un Mute</button>
                    </div>
                </div>
            @empty
                <p>You Dont have Mute user</p>
            @endforelse
        </div>
    </div>
</div>
