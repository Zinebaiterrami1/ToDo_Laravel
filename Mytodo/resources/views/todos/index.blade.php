@extends('layouts.app')

@section('styles')
<style>
    #outer{
        width: 100%;
        text-align: center;
    }

    .inner{
        display: inline-block;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                    @if(Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('error')}}
                    </div>
                    @endif

                    @if(Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                    {{ Session::get('alert-info')}}
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                    </div>
                    @endif
                
                    <a href="{{ route('todos.create') }}" class="btn btn-sm btn-info">Create Todo</a>
                    @if(count($todo) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todo as $i)
                            <tr>
                                <td>{{ $i->title }}</td>
                                <td>{{ $i->description }}</td>
                                <td>
                                    @if($i->is_completed == 1)
                                        <a href="" class="btn btn-sm btn-success">Done</a>
                                    @else
                                        <a href="" class="btn btn-warning">Incomplet</a>
                                    @endif
                                </td>

                                <td id="outer">
                                <a href="{{ route('todos.show' , $i->id) }}" class="inner btn btn-sm btn-success">View</a>
                                <a href="{{ route('todos.edit' , $i->id) }}" class="inner btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('todos.destroy') }}" method="POST" class="inner">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="todo_id" value="{{ $i->id}}">
                                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h4>Aucune Todo creer</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
