@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD Comment</div>

                <div class="card-body">
                    <form method="POST" action="{{route('users.comment')}}">
                        @csrf

                        <!-- Display success message using Bootstrap alert component -->
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <!-- Retrieve and display success message from Session object -->
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Hello {{ Auth::user()->name }} !</label>

                            <div class="col-md-8">
                                <input id="user_id" type="hidden"
                                    name="user_id" value="{{Auth::user()->id}}" required autocomplete="name">
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Add your Comment :</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="name" placeholder="Add Comment">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>



                </div>


                @endsection