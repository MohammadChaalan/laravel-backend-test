@extends('layouts.app')


@section('content')

<div class="container py-5">

        <div class="card mb-4">
          <div class="card-body shadow" style="background-color: #E2E2E2;">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$message->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$message->email}}</p>
              </div>
            </div>
            <hr>
             <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Messages</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$message->message}}</p>
              </div>
            </div>
            
            </div>
          </div>
        </div>

@endsection