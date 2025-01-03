@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-white">
        <div class="w-full max-w-md mx-auto p-6">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-primary">Sign In</h2>
                <p class="text-secondary mt-2">Silahkan Masuk Email dan Kata Sandi Yang Sesuai</p>
            </div>

            <div
                class="bg-card p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] backdrop-blur-sm border border-gray-100">
                <form class="space-y-6" action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <input type="email" name="email" placeholder="Enter your email" class="input-field" required>
                    </div>

                    <div class="space-y-2">
                        <input type="password" name="password" placeholder="Enter your password" class="input-field"
                            required>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox"
                            class="w-5 h-5 border-2 border-gray-300 rounded-lg text-blue-500 focus:ring-blue-500 mr-3">
                        <span class="text-sm text-secondary select-none">Keep me signed in</span>
                    </div>

                    <button class="w-full py-4 px-6 rounded-xl font-medium text-white" style="background-color:#2b6cb0;">
                        Sign in
                    </button>
                </form>
            </div>

            <p class="mt-8 text-center text-secondary">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-accent font-medium hover:text-blue-700" style="color:#2b6cb0;">Create Account</a>
            </p>
        </div>
    </div>
@endsection
