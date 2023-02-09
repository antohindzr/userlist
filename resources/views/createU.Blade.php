@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Entry
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="number">Number</label>
              <input type="number" class="form-control" name="number"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="var">Source</label>
              <p><select type="text" class="form-control" name="var">
                
                <option>MySQL</option>
                <option>JSON</option>
                <option>Excel</option>
              </select></p>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Entry</button>
      </form>
  </div>
</div>
@endsection