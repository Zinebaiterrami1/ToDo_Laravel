@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos</div>

                <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
 <form method="POST" action="{{ route('todos.store') }}">
  @csrf
  <div class="form-group">
    <label>Titre</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" cols="5" rows="5" class="form-control"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
