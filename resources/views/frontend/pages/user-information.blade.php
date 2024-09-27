@extends('layouts.frontend')
@section('content')
    <div class="container mx-auto p-6">
        <h5 class="text-xl mb-6">User Informations</h5>

        <!-- User Information Section -->
        <div class="block p-4 rounded-lg justify-between items-center transition border">
            <div class="flex items-center justify-between space-x-4 mb-8">
                <span class="font-semibold">User Information:</span><span>{{ auth()->user()->name }}</span>
            </div>
            {{-- <div class="flex items-center justify-between space-x-4 mb-8">
                <span class="font-semibold">Address:</span><span>Location Goes here</span>
            </div> --}}
            <div class="flex items-center justify-between space-x-4 mb-8">
                <span class="font-semibold">Email Address:</span><span>{{ auth()->user()->email }}</span>
            </div>
            {{-- <div class="flex items-center justify-between space-x-4 mb-8">
                <span class="font-semibold">Contact Info:</span><span>Contact Info Goes here</span>
            </div> --}}
        </div>

    </div>
@endsection
