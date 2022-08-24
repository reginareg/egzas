@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>All resraurants</h1>
                        <div> Sort:
                            <a href="{{route('r.index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('r.index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('r.index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($restaurants as $restaurant)
                                <li class="list-group-item">
                                    <div class="restaurant-bin">
                                        <div class="restaurant-box">
                                            <h2>{{$restaurant->name}}</h2>
                                        </div>
                                        <div class="controls">
                                            {{-- <a class="btn btn-outline-primary m-2" href="{{route('r.show', $restaurant->id)}}">Show</a> --}}

                                            <a class="btn btn-outline-success m-2" href="{{route('r.edit', $restaurant)}}">Edit</a>
                                            <form class="delete" action="{{route('r.delete', $restaurant->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No restaurant no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection