@extends('layouts.app')

@section('content')
<div class="w-full mx-auto -mt-6">
    <h1 class="text-grey-darkest text-2xl">Thanks for visiting.</h1><br>
    <h2 class="text-grey-dark text-xl mb-8">Fill the form below to make your donation.</h2>
    <stripe-component></stripe-component>
</div>
@stop