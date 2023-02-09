@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">
       {{Session::get('fail')}}
    </div>
@endif
<table class="table">
    <thead>
    <tr class="table-warning">
          <td style="text-align: center; vertical-align: middle;">From MySQL-table "users"</td>
          </tr>
    </thead>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>id</td>
          <td>name</td>
          <td>number</td>
          <td>email</td>
          <td>email_verified_at</td>
          <td>password</td>
          <td>remember_token</td>
          <td>created_at</td>
          <td>updated_at</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $users)
        <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->name}}</td>
            <td>{{$users->number}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->email_verified_at}}</td>
            <td>{{$users->password}}</td>
            <td>{{$users->remember_token}}</td>
            <td>{{$users->created_at}}</td>
            <td>{{$users->updated_at}}</td>
            <td class="text-center">
            <a href="{{ route('users.edit', $users->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('users.destroy', $users->id)}}" method="post" style="display: inline-block">
               
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <table class="table">
    <thead>
    <tr class="table-warning">
          <td style="text-align: center; vertical-align: middle;">From JSON-file listuserto.json</td>
          </tr>
    </thead>
    <table class="table">
    <thead>
        <tr class="table-warning">
          <td>id</td>
          <td>name</td>
          <td>number</td>
          <td>email</td>
          <td>email_verified_at</td>
          <td>password</td>
          <td>remember_token</td>
          <td>created_at</td>
          <td>updated_at</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($jsonuser as $jsonusers)
        <tr>
            <td>{{$jsonusers->id}}</td>
            <td>{{$jsonusers->name}}</td>
            <td>{{$jsonusers->number}}</td>
            <td>{{$jsonusers->email}}</td>
            <td>{{$jsonusers->email_verified_at}}</td>
            <td>{{$jsonusers->password}}</td>
            <td>{{$jsonusers->remember_token}}</td>
            <td>{{$jsonusers->created_at}}</td>
            <td>{{$jsonusers->updated_at}}</td>
            <td class="text-center">
            <a href="{{ route('users.edit', $users->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('users.destroy', $users->id)}}" method="post" style="display: inline-block">
               
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <table class="table">
    <thead>
    <tr class="table-warning">
          <td style="text-align: center; vertical-align: middle;">From Excel-file listuserto.xslx</td>
          </tr>
    </thead>
    <table class="table">
    <thead>
        <tr class="table-warning">
          <td>id</td>
          <td>name</td>
          <td>number</td>
          <td>email</td>
          <td>email_verified_at</td>
          <td>password</td>
          <td>remember_token</td>
          <td>created_at</td>
          <td>updated_at</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($exceluser as $excelusers)
        <tr>
            <td>{{$excelusers->id}}</td>
            <td>{{$excelusers->name}}</td>
            <td>{{$excelusers->number}}</td>
            <td>{{$excelusers->email}}</td>
            <td>{{$excelusers->email_verified_at}}</td>
            <td>{{$excelusers->password}}</td>
            <td>{{$excelusers->remember_token}}</td>
            <td>{{$excelusers->created_at}}</td>
            <td>{{$excelusers->updated_at}}</td>
            <td class="text-center">
            <a href="{{ route('users.edit', $users->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('users.destroy', $users->id)}}" method="post" style="display: inline-block">
               
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
<div>
<a href="{{ route('users.create')}}" class="btn btn-success btn-lg">Create</a>

 @endsection
 
