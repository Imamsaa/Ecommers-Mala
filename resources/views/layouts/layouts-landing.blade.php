<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="frontend/css/style.css">
    <script src="frontend/js/script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      .container-fluid{
        background-color: #F3F3E0;
      }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
<div class="sosial">
    ss
  </div>
  <header>
    <img src="https://placehold.co/100x40" alt="Logo">
    <nav>
        <ul>
            <li><a href="/" class="active">Home</a></li>
            <li class="dropdown">
                <a href="/products">Produk</a>
                <ul class="dropdown-menu">
                    <li><a href="produk.html">Peralatan Kebersihan</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="d-flex" style="display:flex; align-items:center;">
        <a  href="/cart" style="display: inline-block;" class="relative text-gray-600 hover:text-blue-600 transition" aria-label="View Cart">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span id="cart-count" class="cart-badge absolute -top-2 -right-2 bg-blue-700 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">0</span>

        </a>
        {{-- <a href="/orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-600">Order</a> --}}
        @guest
        <a href="{{ route('login') }}" class="btn" style="margin-left:20px;">Login</a>
        <a href="{{ route('register') }}" class="btn" style="margin-left:5px;">Register</a>
        @else
        <button style="margin-left:20px;" class="btn"><span>{{ Auth::user()->name }}</span></button>
        <form method="POST" action="{{ route('logout') }}" style="display:inline-block;" class="py-2">
        @csrf
            <button type="submit" style="margin-left:5px;" class="btn">Logout</button>
        </form>
        @endguest
    </div>
  </header>
    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>
    <footer>
        <p>© 2024 Store. All rights reserved.</p>
    </footer>
</body>
<script src="{{ config('midtrans.payment_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-PS1I8nolVogAFXyg"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>

</html>
