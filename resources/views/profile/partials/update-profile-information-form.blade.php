<section class="container">
    <header class="mb-4">
        <h2 class="text-lg font-medium text-dark">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-muted small">
            Perbarui informasi profil dan nama pengguna akun Anda.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input id="username" name="username" type="text"
                class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username', $user->username) }}" required autocomplete="username">
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small mb-0">Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
