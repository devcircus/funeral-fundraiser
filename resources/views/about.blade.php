@extends('layouts.app')

@section('content')
    <div class="flex flex-col w-full -ml-2 mb-4">
        <h1 class="post-title text-4xl mb-2 font-normal text-grey-darkest uppercase">Martha Brown</h1>
        <div class="stripe p-12 xl:p-20">
            <div class="stripe__content flex flex-col lg:flex-row justify-between">
                <div class="w-full lg:w-1/4 mr-4">
                    <img src="image" class="w-3/5 lg:w-full rounded-lg shadow-md border-2 border-white lg:mr-0" />
                </div>
                <div class="w-full lg:w-3/4">
                    <p class="text-green-lightest text-2xl lg:mt-4">
                        She was a loving and devoted mother who raised 4 kids on her own. She always made sure they had what they needed, even if she had to do without. She was loyal, honest, strong, had a loving heart and a gentle soul.
                    </p>
                    <p class="text-green-lightest text-2xl lg:mt-4">
                        She loved her grand and great grandchildren with all her heart and could tell you the names and birthdays of every one of them. She left a lasting impression on everyone she met and will be missed by all of them.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop