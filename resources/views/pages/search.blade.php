@extends('layouts.page')

@section('content')

    {!! $page->field('introduction') !!}

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Services</th>
                <th>Disabilities</th>
                <th>Age Groups</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Age Groups</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resources as $resource)
                <tr>
                    <td>{{ $resource->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('scripts')

    @parent

@endsection

@section('head_scripts')

    @parent

@endsection
