@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dishes List</div>

                    <div class="card-header mb-3">
                        <h6 class="text-center">
                        <h1>Sort</h1></h6>
                        <div class="d-flex justify-content-between">
                            <a href="{{route('d.index', ['sort' => 'asc'])}}">name A to Z</a>
                            <a href="{{route('d.index', ['sort' => 'desc'])}}">name Z to A</a>
                            <a href="{{route('d.index')}}">Reset - from last</a>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @forelse($dishes as $dish)
                        <div class="col">
                            <div class="card h-100">

                                <img src="{{$dish->photo}}" class="card-img-top" alt="photo here">
                                
                                @if(Auth::user()->role >= 10)
                                <div class="btn-group" role="group">
                                    <a href="{{route('d.edit', $dish->id)}}" type="button" class="btn btn-warning">Edit</a>
                                    <form class="btn btn-danger" action="{{route('d.delete', $dish)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="bd">Delete</button>
                                    </form>

                                </div>
                                @endif

                                
                            </div>

                        </div>
                            @empty
                                <h5 class="card-title">no dishes - no business</h5>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>

@endsection