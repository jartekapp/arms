@extends('layouts.page')

@section('content')

    <section class="page-section">
        <div class="container">
        <h2 class="page-section-title">Contact Us</h2>
            <div class="row">
                <div class="col-sm-6">
                    {!! $page->field('info') !!}
                </div>
                <div class="col-sm-6">
                    <h3>Email Us</h3>
                    {!! Form::open(['route' => 'contact']) !!}
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control" />
                        <label>Your Email</label>
                        <input type="email" name="email" class="form-control" />
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" />
                        <label>Your Message</label>
                        <textarea class="form-control"></textarea>
                        <button class="btn btn-primary" style="margin: 10px 0;">Send</button>
                    {!! Form::close() !!}

                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

    @parent

@endsection

@section('head_scripts')

    @parent

@endsection
