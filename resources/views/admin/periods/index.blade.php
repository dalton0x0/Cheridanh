@extends('layouts.admin.base')

@section('title', 'Périodes')

@section('content')
    <div class="container py-5">
        @include('partials.flash')
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bolder mb-0">
                <span class="text-gradient d-inline">{{ Str::plural('Période', $periods->count()) }} : {{ $periods->count() }}</span>
            </h1>
            <a href="{{ route('admin.periods.create') }}" class="btn btn-outline-success me-2 rounded"><i class="bi-plus-circle"></i></a>
        </div>
        <hr>
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th class="text-end text-align-left">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($periods as $period)
                <tr>
                    <td>{{ $period->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.periods.edit', $period) }}" class="btn btn-outline-primary me-2 rounded">
                                <i class="bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.periods.destroy', $period) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-outline-danger me-2 rounded">
                                    <i class="bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
