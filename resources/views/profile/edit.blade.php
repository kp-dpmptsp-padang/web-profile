@extends('layouts.app')

@section('app')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-4">
        <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">{{ __('Pengaturan Akun') }}</h2>
        <p class="text-gray-500 sm:text-lg dark:text-gray-400 mb-6">Kelola pengaturan profil dan preferensi akun Anda..</p>
        
        <div class="grid gap-6">
            <!-- Profile Information -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <!-- <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> -->
        </div>
    </div>
</section>
@endsection