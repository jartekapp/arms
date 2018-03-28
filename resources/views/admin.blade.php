@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Edit home page</div>

                <div class="panel-body">
                    @if ($page)

                        {!! Form::open(['route' => 'home.update', 'method' => 'PUT']) !!}
                            @foreach ($page->fields as $field)
                                <div class="form-group row">
                                    <label for="{{ $field->slug }}" class="col-md-4 control-label">{{ $field->name }}</label>

                                    @if ('text' === $field->type)
                                        <div class="col-md-12">
                                            <input id="{{ $field->slug }}" type="text" class="form-control" name="fields[{{ $field->slug }}]" value="{{ old($field->slug, $field->content) }}" />
                                        </div>
                                    @elseif ('textarea' === $field->type)
                                        <div class="col-md-12">
                                            <textarea id="{{ $field->slug }}" class="form-control" name="fields[{{ $field->slug }}]">{{ old($field->slug, $field->content) }}</textarea>
                                        </div>
                                    @elseif ('wysiwyg' === $field->type)
                                        <div class="col-md-12">
                                            <textarea id="{{ $field->slug }}" class="form-control wysiwyg" name="fields[{{ $field->slug }}]">{{ old($field->slug, $field->content) }}</textarea>
                                        </div>
                                    @elseif ('repeater' === $field->type)
                                        <div class="col-md-12">
                                            @foreach ($field->content as $subFieldIndex => $subFields)
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        @foreach ($subFields as $subField)
                                                            <div class="form-group row">
                                                                <label for="{{ $field->slug }}-{{ $subFieldIndex }}-{{ $subField->slug }}" class="col-md-4 control-label">{{ $subField->name }}</label>
                                                                @if ('text' === $subField->type)
                                                                    <div class="col-md-12">
                                                                        <input id="{{ $field->slug }}-{{ $subFieldIndex }}-{{ $subField->slug }}" type="text" class="form-control" name="fields[{{ $field->slug }}][{{ $subFieldIndex }}][{{ $subField->slug }}]" value="{{ old($subField->slug, $subField->content) }}" />
                                                                    </div>
                                                                @elseif ('textarea' === $subField->type)
                                                                    <div class="col-md-12">
                                                                        <textarea id="{{ $field->slug }}-{{ $subFieldIndex }}-{{ $subField->slug }}" class="form-control" name="fields[{{ $field->slug }}][{{ $subFieldIndex }}][{{ $subField->slug }}]">{{ old($subField->slug, $subField->content) }}</textarea>
                                                                    </div>
                                                                @elseif ('wysiwyg' === $subField->type)
                                                                    <div class="col-md-12">
                                                                        <textarea id="{{ $field->slug }}-{{ $subFieldIndex }}-{{ $subField->slug }}" class="form-control wysiwyg" name="fields[{{ $field->slug }}][{{ $subFieldIndex }}][{{ $subField->slug }}]">{{ old($subField->slug, $subField->content) }}</textarea>
                                                                    </div>
                                                                @elseif ('repeater' === $subField->type)
                                                                    <div class="col-md-12">
                                                                        Repeater fields cannot be nested
                                                                    </div>
                                                                @elseif ('boolean' === $subField->type)
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" class="form-control" name="fields[{{ $field->slug }}][{{ $subFieldIndex }}][{{ $subField->slug }}]" value="0" />
                                                                        <input id="{{ $field->slug }}-{{ $subFieldIndex }}-{{ $subField->slug }}" type="checkbox" class="form-control" name="fields[{{ $field->slug }}][{{ $subFieldIndex }}][{{ $subField->slug }}]" value="1" {{ old($subField->slug, $subField->content) ? 'checked' : '' }} />
                                                                    </div>
                                                                @else
                                                                    <div class="col-md-12">
                                                                        Unknown field type: {{ $subField->type }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif ('boolean' === $field->type)
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" name="fields[{{ $field->slug }}]" value="0" />
                                            <input id="{{ $field->slug }}" type="checkbox" class="form-control" name="fields[{{ $field->slug }}]" value="1" {{ old($field->slug, $field->content) ? 'checked' : '' }} />
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            Unknown field type: {{ $field->type }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="form-group">
                                <button class="btn btn-primary pull-right" type="submit">Save</button>
                            </div>

                        {!! Form::close() !!}

                    @else
                        <div class="alert alert-warning">
                            Database has not been seeded yet. Please run <code>$ php artisan db:seed --force</code>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
