@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Messages</h1>
        <table class="table table-striped shadow">
            <thead class="thead-primary">
            <hr>
              <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Messages</th>
                    <th>Date</th>
                   

                </tr>
            </thead>
            <tbody>
                 <!-- Loop through each audit for all user and display their details in table -->

                @foreach($message as $current)
                    <tr>
                        
                        <td>{{ $current->id }}</td>
                        <td>{{ $current->name }}</td>
                        <td>{{ $current->email }}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('one.message.show',['id'=>$current->id])}}">Show Message</a></td>                       
                        <td>{{ $current->created_at}}</td>

                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
