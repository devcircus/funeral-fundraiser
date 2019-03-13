@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded pt-6 pb-8 mb-4 flex flex-col border-t-4 border-blue w-full">
    <div class="w-full bg-blue h-60p mb-4">
        <h1 class="text-lg text-white px-6 pt-4">All Donations</h1>
    </div>
    <div class="flex justify-between items-center text-left px-8 py-1 mb-2">
        <span class="flex-1 font-semibold text-base text-blue hover:text-blue-light">Name</span>
        <span class="flex-1 hidden md:block font-semibold text-base text-blue hover:text-blue-light">Phone</span>
        <span class="flex-1 font-semibold text-base text-blue hover:text-blue-light">Amount</span>
    </div>
    @forelse($donations as $donation)
        <div class="flex justify-between items-center text-left px-8 py-1 mb-2">
            <span class="flex-1 font-normal text-base text-blue hover:text-blue-light">{{ $donation['name'] }}</span>
            <span class="flex-1 hidden md:block font-normal text-base text-blue hover:text-blue-light">{{ $donation['phone'] }}</span>
            <span class="flex-1 font-normal text-base text-blue hover:text-blue-light">{{ $donation['amount'] }}</span>
        </div>
    @empty
        <div class="flex justify-between items-center text-left px-8 py-1 mb-2">
            <span class="flex-1 font-normal text-base text-blue hover:text-blue-light">No donations yet</span>
        </div>
    @endforelse
    </div>
    @stop