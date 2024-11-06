@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        {{-- JS --}}
        @vite("resources/js/welcome.js")
    </head>
    <body>
        {{-- Qui il codice per il log-in iniziale --}}
        {{-- <div>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div> --}}
    @section('content')
    <div class="main-layout">
        <main>
            <div class="general-layout d-flex">
                <nav class="project-navigation">
                    <ul>
                        @for ($i = 0; $i < 10; $i++)
                        <li>Test</li>
                        @endfor
                    </ul>
                </nav>
                <div class="main-content">
                    <div class="container">
                        @if (Auth::check())
                        <h1 class="text-center">
                            Welcome in your Project Manager <strong>{{$users[0]->name}}</strong>
                        </h1>
                        @else
                        <h1 class="text-center">
                            Welcome in the general Project Manager
                        </h1>
                        @endif
                        <div class="task-to-do">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="py-3 fw-bold text-center">
                                        Project to do:
                                    </h2>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        @if (Auth::check())
                                        <a href="{{ route("admin.projects.create") }}" class="btn btn-primary btn-lg">
                                            Create new Project
                                        </a>
                                        @endif
                                    </div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Done</th>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ( $projects as $index => $project )
                                            <tr>
                                                <td>
                                                    <form action="" class="btn-group done" role="group" aria-label="Basic checkbox toggle button group">
                                                        <input type="checkbox" class="btn-check" id="btncheck{{$project->id}}" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="btncheck{{$project->id}}">Done</label>
                                                    </form>
                                                </td>
                                                <td>
                                                    {{ $project->id }}
                                                </td>
                                                <td>
                                                    {{ $project->title }}
                                                </td>
                                                <td>
                                                    {{ $project->author }}
                                                </td>
                                                <td>
                                                    {{ $project->date }}
                                                </td>
                                                <td>
                                                    {{ $project->description }}
                                                </td>
                                                <td>
                                                    <a href="/admin/projects/{{ $index + 1 }}" class="btn btn-sm btn-primary me-2">Show</a>

                                                    @if (Auth::check())

                                                    <a href="{{ route("admin.projects.edit", $project->id) }}"  class="btn btn-sm btn-success me-2">Edit</a>

                                                    <form class="d-inline env-destroyer" action="{{ route("admin.projects.delete", $project->id) }}" method="POST" custom-data-name="{{ $project->name }}" >
                                                        @method("DELETE")
                                                        @csrf

                                                        <button type="submit" class="btn btn-sm btn-warning me-2">
                                                            Delete
                                                        </button>
                                                    </form>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6">No project are available at the moment, you are free to go!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="project-done">
                            <div class="row">
                                <div class="col-12"><h2 class="py-3 fw-bold text-center">Project Done</h2></div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Done</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Priority</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- @if (Auth::check())
                    <a class="btn btn-primary" href="/admin/projects">Task's List</a>
                    @endif --}}
                </div>
            </div>
        </main>
    </div>
    @endsection
    </body>
</html>
