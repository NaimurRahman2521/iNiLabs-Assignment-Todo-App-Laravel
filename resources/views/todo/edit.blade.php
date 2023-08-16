@extends('master')
@section('body')
    <div class="section py-5">
        <div class="container">
            <form action="{{route('todo.update',['id' => $todo->id])}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <textarea name="todo" class="form-control" id="" cols="30" rows="3">{{$todo->todo}}</textarea>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary form-control">
                            Update Todo
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
