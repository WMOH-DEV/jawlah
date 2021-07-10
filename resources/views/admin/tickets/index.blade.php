@extends('admin.main-layout')

@section('title')التذاكر@endsection


@section('content') <livewire:ticket /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->

    <script src="{{asset('admin/helpers/js/ticket-index.js')}}"></script>
@endsection


