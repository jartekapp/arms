@extends('layouts.page')

@section('content')

    <section class="page-section landing-page-section" style="background-image: url('{{ asset('img/cover.jpg') }}');">
        <div class="container">
            {!! $page->field('landing-cover-text') !!}
        </div>
    </section>

    <section class="page-section">
        <span id="about-us" style="position:absolute;top:-160px;"></span>
        <div class="container">
            {!! $page->field('about-us') !!}
        </div>
    </section>

    <section class="page-section light-bg angled-high-to-low-top pb-6">
        <div class="container">
            {!! $page->field('our-values') !!}
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            {!! $page->field('projects') !!}
        </div>
    </section>

    <section class="page-section light-bg angled-low-to-high-top mb-0 pb-6">
        <div class="container">
            {!! $page->field('affiliations') !!}
        </div>
    </section>

@endsection

@section('scripts')

    @parent

@endsection

@section('head_scripts')

    @parent

@endsection
