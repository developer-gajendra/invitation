<x-guest-layout>
  <div class="card p-4">
    <div class="card-body d-flex flex-column gap-4 text-center">
      <div class="mx-auto text-primary">
        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
          <rect width="20" height="16" x="2" y="4" rx="2"></rect>
          <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
        </svg>
      </div>

      <div>
        <h2 class="h4 font-weight-bold mb-2">Check your email</h2>
        <p class="text-body-secondary small mb-0">
          Thanks for signing up! Please click the verification link we just sent to
          @if(auth()->check())
            <span class="fw-semibold text-body">{{ auth()->user()->email }}</span>
          @else
            your email address
          @endif
          to activate your account.
        </p>
      </div>

      <!-- Status Alert -->
      @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible fade show text-start mb-0 small" role="alert">
          A new verification link has been sent to your registered email address.
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="d-flex flex-column gap-2 mt-2">
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button class="btn btn-primary w-100 py-2 fw-semibold" type="submit">
            Resend Verification Email
          </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-outline-secondary w-100 py-2 btn-sm">
            Log Out
          </button>
        </form>
      </div>
    </div>
  </div>

  <div class="text-center text-body-secondary small">
    Didn't receive an email? Check your spam folder or click Resend above.
  </div>
</x-guest-layout>
