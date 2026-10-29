<x-guest-layout>
  <div class="card p-4">
    <div class="card-body d-flex flex-column gap-4">
      <div class="text-center">
        <h2 class="h4 font-weight-bold mb-1">Forgot password?</h2>
        <p class="text-body-secondary small mb-0">Enter your email address and we will send you a link to reset your password.</p>
      </div>

      <!-- Session Status Alert -->
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
          {{ session('status') }}
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

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

      <form class="d-flex flex-column gap-3" method="POST" action="{{ route('password.email') }}" autocomplete="off" novalidate>
        @csrf

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
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required autofocus>
          </div>
          @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-2">
          <button class="btn btn-primary w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2" type="submit">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m22 2-7 20-4-9-9-4Z"></path>
              <path d="M22 2 11 13"></path>
            </svg>
            <span>Email Password Reset Link</span>
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="text-center text-body-secondary small">
    Remembered your password?
    <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Sign in</a>
  </div>
</x-guest-layout>
