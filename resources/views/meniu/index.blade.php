@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Meniu</h1>
                        <div> RSort:
                            <a href="{{route('pc_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('pc_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('pc_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($menius as $meniu)
                                <li class="list-group-item">
                                    <div class="meniu-bin">
                                        <div class="meniu-box">
                                            <h2>{{$meniu->name}}</h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-primary m-2" href="">Show</a>

                                            <a class="btn btn-outline-success m-2" href="">Edit</a>
                                            <form class="delete" action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No meniu no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection