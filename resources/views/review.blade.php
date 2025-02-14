@extends('layouts.main')
@section('title', 'Testimoni | DPMPTSP Kota Padang')
@section('content')

<style>
    @layer utilities {
        .line-clamp-4 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    }
</style>

@php
    use Carbon\Carbon;
@endphp

<div class="overflow-hidden pt-32 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Suara Masyarakat</h1>
            <p class="text-xl text-gray-600">Testimoni Pelayanan DPMPTSP Kota Padang</p>
            <div class="mt-4 flex justify-center">
                <div class="h-1 w-24 bg-red-600 rounded-full"></div>
            </div>
        </div>

        <div class="mb-12 flex justify-center">
            <div class="relative w-72">
                <form action="{{ route('testimoni') }}" method="GET">
                    <div class="relative">
                        <select name="service_type" onchange="this.form.submit()" class="w-full appearance-none bg-white border-2 border-gray-200 rounded-lg px-4 py-3 pr-8 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-200 text-gray-700 cursor-pointer hover:border-red-400">
                            <option value="">Semua Layanan</option>
                            @foreach($serviceTypes as $type)
                                <option value="{{ $type->id }}" {{ request('service_type') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-red-500">
                            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($testimonies as $testimony)
            <div class="group h-full">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-red-200 h-full flex flex-col">
                    <div class="p-8 flex flex-col flex-grow">
                        <div class="mb-6">
                            <span class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-red-500 to-red-600 text-white text-sm font-semibold shadow-md">
                                {{ $testimony->serviceType->name }}
                            </span>
                        </div>

                        <blockquote class="text-gray-600 mb-8 italic flex-grow">
                            <div class="line-clamp-4"> 
                                "{{ $testimony->testimony }}"
                            </div>
                        </blockquote>

                        <div class="flex items-center justify-between text-sm text-gray-500 border-t pt-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ Carbon::parse($testimony->date)->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                                </svg>
                                <span>{{ $testimony->queue_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500">Belum ada testimoni untuk ditampilkan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-16 mb-12">
            {{ $testimonies->links() }}
        </div>
    </div>
</div>
@endsection