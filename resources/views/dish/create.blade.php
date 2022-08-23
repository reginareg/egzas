@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new dish</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('d.store')}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">About</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="about" >
                                </div>
                            </div>

                            <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Upload photo</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="file">
                        </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection