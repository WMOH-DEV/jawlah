@extends('admin.main-layout')

@section('title')قائمة التعليقات@endsection


@section('content') <livewire:comment-wire /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


