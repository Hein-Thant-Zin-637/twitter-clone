<div>
    <form wire:submit.prevent="changePassword">
        @csrf
        <div class="form-floating mb-3 mt-3">
            <input type="password" wire:model="password"
                class="form-control shadow-none @if ($error['password'] ?? false) is-invalid  @endif" id="password"
                placeholder="Password" name="password">
            <label for="password">Password</label>
            @if ($error['password'] ?? false)
                <small class="text-danger">{{ $error['password'] }}</small>
            @endif
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="password" wire:model="password_confirmation"
                class="form-control shadow-none  @if ($error['password_confirmation'] ?? false) is-invalid  @endif"
                id="password_confirmation" placeholder="password Confirmation" name="password_confirmation">
            <label for="password_confirmation">Confirm Password</label>
            @if ($error['password_confirmation'] ?? false)
                <small class="text-danger">{{ $error['password_confirmation'] }}</small>
            @endif
        </div>
        <div class="form-floating mb-3 mt-3">
            <input type="password" wire:model="original_password"
                class="form-control shadow-none  @if ($error['original_password'] ?? false) is-invalid  @endif"
                id="original_password" placeholder="Original Password" name="original_password">
            <label for="original_password">Original Password</label>
            @if ($error['original_password'] ?? false)
                <small class="text-danger">{{ $error['original_password'] }}</small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-lg float-end">Update</button>
    </form>
</div>
