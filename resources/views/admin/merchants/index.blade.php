@extends('admin.main-layout')

@section('title')قائمة التجار@endsection


@section('content') <livewire:merchant /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


