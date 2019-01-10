
@extends('layouts.app')

@section('content')
    <a href="{{ route('projects.create') }}" class="btn btn-success my-5">
        +
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Url</th>
            <th scope="col">Status</th>

        </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row"> {{ $project->id }} </th>
                    <td> {{ $project->name }} </td>
                    <td> {{ $project->url }} </td>
                    <td> {{ ($project->checks->last()) ? $project->checks->last()->code : ' ' }} </td>
                </tr>
            @empty
                <tr><td>No projects.</td></tr>
            @endforelse
    </tbody>
    </table>
@endsection 
