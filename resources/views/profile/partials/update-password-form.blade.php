<section class="container">
    <header class="mb-4">
        <h2 class="h4 fw-bold text-dark">
            Ubah Kata Sandi
        </h2>
        <p class="text-muted">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <!-- Kata Sandi Saat Ini -->
        <div class="mb-3">
            <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
            <div class="input-group">
                <input type="password" id="current_password" name="current_password" class="form-control"
                    autocomplete="current-password">
                <button type="button" class="btn btn-outline-secondary toggle-password"
                    data-target="#current_password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <!-- Kata Sandi Baru -->
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi Baru</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger mt-1">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-group">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    autocomplete="new-password">
                <button type="button" class="btn btn-outline-secondary toggle-password"
                    data-target="#password_confirmation">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <!-- Tombol Simpan -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Simpan</button>

            @if (session('status') === 'password-updated')
                <span class="text-success" id="password-update-message" style="display: none;">
                    Disimpan.
                </span>
                <script>
                    setTimeout(() => {
                        document.getElementById('password-update-message').style.display = 'inline';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>

<script>
    // Toggle visibility for password fields
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const target = document.querySelector(this.dataset.target);
            if (target.type === 'password') {
                target.type = 'text';
                this.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                target.type = 'password';
                this.innerHTML = '<i class="bi bi-eye"></i>';
            }
        });
    });
</script>
