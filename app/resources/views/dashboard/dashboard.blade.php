@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcumb')
    <x-breadcumb></x-breadcumb>
@endsection

@section('content')
    @include('components.validate-error')
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">

    </div>
@endsection
