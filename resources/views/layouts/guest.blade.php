<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Invitation Platform') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('coreui/assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('coreui/assets/favicon/favicon-32x32.png') }}">

    <!-- Vendors styles -->
    <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('coreui/css/vendors/simplebar.css') }}">

    <!-- CoreUI & Bootstrap 5 Main styles -->
    <link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">

    <!-- Custom Invitation Theme tweaks -->
    <style>
      :root {
        --cui-primary: #7c3aed;
        --cui-primary-rgb: 124, 58, 237;
      }
      .btn-primary {
        background-color: #6366f1;
        border-color: #6366f1;
      }
      .btn-primary:hover, .btn-primary:focus {
        background-color: #4f46e5;
        border-color: #4f46e5;
      }
      .auth-brand {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        text-decoration: none;
      }
      .auth-brand-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, #6366f1 0%, #ec4899 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35);
      }
      .auth-brand-text {
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: -0.025em;
        background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
      [data-coreui-theme="dark"] .auth-brand-text {
        background: linear-gradient(135deg, #f8fafc 0%, #cbd5e1 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
      .card {
        border-radius: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
      }
      .input-group-text button {
        color: #64748b;
      }
      .input-group-text button:hover {
        color: #1e293b;
      }
    </style>

    <script src="{{ asset('coreui/js/config.js') }}"></script>
    <script src="{{ asset('coreui/js/color-modes.js') }}"></script>
  </head>
  <body>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center py-5">
      <div class="container" style="max-width: 32rem">
        <div class="d-flex flex-column gap-4">
          <!-- Brand Logo -->
          <a href="{{ url('/') }}" class="auth-brand">
            <div class="auth-brand-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
              </svg>
            </div>
            <span class="auth-brand-text">{{ config('app.name', 'Invitation Platform') }}</span>
          </a>

          <!-- Page Content Card -->
          {{ $slot }}
        </div>
      </div>
    </div>

    <!-- CoreUI & Plugins Scripts -->
    <script src="{{ asset('coreui/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>

    <!-- Password visibility toggle script -->
    <script>
      $(document).ready(function() {
        $('.toggle-password').on('click', function() {
          var targetId = $(this).data('target');
          var input = $('#' + targetId);
          if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).find('.eye-open').addClass('d-none');
            $(this).find('.eye-closed').removeClass('d-none');
          } else {
            input.attr('type', 'password');
            $(this).find('.eye-open').removeClass('d-none');
            $(this).find('.eye-closed').addClass('d-none');
          }
        });
      });
    </script>
    @stack('scripts')
  </body>
</html>
