@extends('master')
@section('body')
    <div class="section py-5">
        <div class="container">
            <form action="{{route('todo.new')}}" method="POST">
                @csrf
            <div class="row">
                <h5 class="text-success text-center">{{Session::get('message')}}</h5>
                <div class="col-md-9">
                    <textarea name="todo" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary form-control">
                        Add Todo
                    </button>
                </div>

            </div>
            </form>
            <div class="row pt-5">
                <div class="col-md-12">
                    <h3>Pending Todos</h3>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="bg-info bg-opacity-25 text-center">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Todo</th>
                            <th scope="col" colspan="3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($todos as $todo)
                            @if($todo->status==0)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$todo->todo}}</td>
                            <td class="text-center">
                                <form action="{{route('todo.done')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="id" value="{{$todo->id}}">
                                    <button type="submit" class="btn btn-primary my-2">
                                        Mark as Done
                                    </button>
                                </form>

                                <a href="{{route('todo.edit', ['id' => $todo->id])}}" class="btn btn-secondary">
                                    Edit
                                </a>
                                <a href="{{route('todo.delete', ['id' => $todo->id])}}" class="btn btn-danger" onclick="return confirm('Ary you sure to delete this!');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12">
                    <h3>Completed Todos</h3>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="bg-success bg-opacity-25 text-center">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Todo Completed</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($todos as $todo)
                            @if($todo->status==1)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$todo->todo}}</td>
                        </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
