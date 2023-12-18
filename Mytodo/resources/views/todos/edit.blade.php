@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos</div>
              
                <div class="card-body">
                
                <h4>Edit</h4>     
                    
 <form method="post" action="{{ route('todos.update') }}">
    @csrf
    @method('PUT')
 <input type="hidden" name="todo_id" value="{{ $todo->id }}">
  <div class="form-group">
    <label>Titre</label>
    <input type="text" class="form-control" name="title" value="{{$todo->title}}">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea name="description" cols="5" rows="5" class="form-control">
        {{$todo->description}}
    </textarea>
  </div>

  <div class="form-group">
    <label for="">Status</label>
    <select name="is_completed" class="form-control">
      <option disabled selected>Select Option</option>
      <option value="1">Completed</option>
      <option value="0">In completed</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update </button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
@endsection