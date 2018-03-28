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

    <section class="page-section connect-page-section mt-0">
        <div class="container">
            <h2 class="page-section-title">Connect With Us</h2>
            <p class="text-center">
                <img src="{{ asset('img/qr.png') }}" alt="qr" />
            </p>
            <p class="connect-info text-center">
                Phone: 02 4274 1090 | Email: info@australianmercy.org | WeChat ID: arms_china_wechat
            </p>
        </div>
    </section>

    <section class="page-section language-page-section">
        <div class="container">
            <p class="text-center">
                <a href=""><img src="{{ asset('img/english.png') }}" alt="english" /> English</a>
                <span> | </span>
                <a href=""><img src="{{ asset('img/chinese.png') }}" alt="english" /> Chinese</a>
            </p>
        </div>
    </section>

@endsection

@section('scripts')

    @parent

    <script type="text/javascript">
        $(function () {
            $('#signup-form').submit(function (e) {
                e.preventDefault();

                $('#signup-form-fields').slideUp();
                $('#signup-form-recaptcha').slideDown();                        
            });

            $('body').on('click', '.video-card', function (e) {
                if (undefined !== $(this).data('locked')) {
                    $('html, body').animate({
                        scrollTop: $("#signup-form").offset().top
                    }, 1000);

                    $('#call-to-action').css('transform', 'scale(1.2)')

                    setTimeout(function() {
                        $('#call-to-action').css('transform', 'initial');
                        $('#signup-form').css('transform', 'scale(1.2)');

                        setTimeout(function() {
                            $('#signup-form').css('transform', 'initial');
                        }, 1000);
                    }, 1000);

                    return false;
                }
            });
        });

        function recaptchaCallback() {
            $.ajax($('#signup-form').attr('action'), {
                type: $('#signup-form').attr('method'),
                data: {
                    _token: $('#signup-form').find('[name="_token"]').val(),
                    'g-recaptcha-response': $('#signup-form').find('[name="g-recaptcha-response"]').val(),
                    email: $('#signup-form').find('[name="email"]').val(),
                    name: $('#signup-form').find('[name="name"]').val()
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#signup-form-recaptcha').slideUp();
                    $('#signup-form-loading').slideDown();
                },
                success: function () {
                    $('[data-locked]').find('.video-card-preview-overlay').show();
                    $('[data-locked]').find('.video-card-preview-locked-overlay').hide();
                    $('[data-locked]').removeAttr('data-locked');

                    $('#signup-form-loading').slideUp();
                    $('#signup-form-success').slideDown();

                    $('#signup-form').find('[name="email"]').val('');
                    $('#signup-form').find('[name="name"]').val('');

                    setTimeout(function() {
                        $('#signup-form-success').slideUp();
                        $('#signup-form-fields').slideDown();
                    }, 5000);

                    $('html, body').animate({
                        scrollTop: $("#videos").offset().top
                    }, 1000);
                },
                error: function (e) {
                    console.log(e);
                    $('#signup-form-loading').slideUp();
                    $('#signup-form-error').slideDown();
                }
            });
        }
    </script>

@endsection

@section('head_scripts')

@endsection
