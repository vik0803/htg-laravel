@extends('layouts.master')

@section('content')
    <h1>HTG Dashboard</h1>
    <h2>Welcome {{ Auth::user()->name }}</h2>
    <p>This is the dashboard for your app.  You should only see this if you are
    logged-in to the site.</p>
    
    
    
    <p><a href="{{ URL::route('auth_logout') }}">Logout</a></p>
@endsection;