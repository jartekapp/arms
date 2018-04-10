@extends('layouts.page')

@section('content')

    {!! $page->field('page-body') !!}

@endsection

@section('scripts')

    @parent

@endsection

@section('head_scripts')

    @parent

@endsection
