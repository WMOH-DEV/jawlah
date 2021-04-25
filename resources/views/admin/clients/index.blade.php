@extends('admin.main-layout')

@section('title')قائمة الأعضاء@endsection


@section('content') <livewire:client /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


