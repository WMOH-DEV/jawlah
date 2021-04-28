@extends('admin.main-layout')

@section('title')التذاكر@endsection


@section('content') <livewire:ticket /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


