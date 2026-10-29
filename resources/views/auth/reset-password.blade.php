<x-guest-layout>
  <div class="card p-4">
    <div class="card-body d-flex flex-column gap-4">
      <div class="text-center">
        <h2 class="h4 font-weight-bold mb-1">Set new password</h2>
        <p class="text-body-secondary small mb-0">Enter your new password and confirm it below.</p>
      </div>

      <!-- General Errors -->
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
          <ul class="mb-0 ps-3 small">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form class="d-flex flex-column gap-3" method="POST" action="{{ route('password.store') }}" autocomplete="off" novalidate>
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
          <label class="form-label small fw-semibold" for="email">Email address</label>
          <div class="input-group">
            <span class="input-group-text bg-body-tertiary">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
              </svg>
            </span>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="your@email.com" required autofocus autocomplete="username">
          </div>
          @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- New Password -->
        <div>
          <label class="form-label small fw-semibold" for="password">New Password</label>
          <div class="input-group">
            <span class="input-group-text bg-body-tertiary">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
            </span>
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Enter new password" required autocomplete="new-password">
            <span class="input-group-text bg-body-tertiary">
              <button class="bg-transparent border-0 p-0 toggle-password" type="button" data-target="password" aria-label="Toggle password visibility">
                <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <svg class="eye-closed d-none" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="m15 18-.722-3.25"></path>
                  <path d="M2 8a10.645 10.645 0 0 0 20 0"></path>
                  <path d="m20 15-1.726-2.05"></path>
                  <path d="m4 15 1.726-2.05"></path>
                  <path d="m9 18 .722-3.25"></path>
                </svg>
              </button>
            </span>
          </div>
          @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div>
          <label class="form-label small fw-semibold" for="password_confirmation">Confirm New Password</label>
          <div class="input-group">
            <span class="input-group-text bg-body-tertiary">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
            </span>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm new password" required autocomplete="new-password">
            <span class="input-group-text bg-body-tertiary">
              <button class="bg-transparent border-0 p-0 toggle-password" type="button" data-target="password_confirmation" aria-label="Toggle password visibility">
                <svg class="eye-open" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <svg class="eye-closed d-none" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="m15 18-.722-3.25"></path>
                  <path d="M2 8a10.645 10.645 0 0 0 20 0"></path>
                  <path d="m20 15-1.726-2.05"></path>
                  <path d="m4 15 1.726-2.05"></path>
                  <path d="m9 18 .722-3.25"></path>
                </svg>
              </button>
            </span>
          </div>
          @error('password_confirmation')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-2">
          <button class="btn btn-primary w-100 py-2 fw-semibold" type="submit">Reset Password</button>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>
