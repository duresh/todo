@extends('layouts.app')
@section('content')

<div class="container">

    <h1 class="ind">Task Entry</h1>
    <div class="row">
        <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-9">
                    <input type="text" class="form-control" name="title" placeholder="Input Task" aria-label="Your task">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary" >Post</button>
                </div>
                </div>
        </form>
    </div>
    <div class="row">
        <div class="col-12 ind1">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)

                    <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{ $task -> title }}</td>
                        <td>@if ($task->done == 0)
                            <span class="badge text-bg-warning">Not Completed</span>
                            @else
                            <span class="badge text-bg-success">Completed</span>

                        @endif</td>
                        <td>
                            <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{ route('todo.done',$task->id) }}" class="btn btn-success"><i class="fa-solid fa-clipboard-check"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection

@push('css')
<style>
.ind{
    padding-top: 5vh;
    font-size: 3rem;
    text-align: center;
    padding-bottom: 5vh;

}

.ind1{
    padding-top: 5vh;
}

</style>
@endpush
