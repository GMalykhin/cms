@extends('admin.index')

@section('content')

<h1><li>Users</li></h1>


<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">42</th>
        <th scope="col">Name</th>
        <th scope="col">User id</th>
        <th scope="col">Role</th>
        <th scope="col">Active User</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)

      <tr>
        <th scope="row">{{ $i++ }}</th>
        <td><img src="{{ $user->image ? $user->image->title : 'http://placehold.it/400x400' }}" alt="" width="50"></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->id }}</td>
        <td>@if (isset($user->role->name)) {{ ucfirst($user->role->name) }} @endif</td>
        <td> @if ($user->is_active == 1) {{ 'Yes' }} @else {{ 'No' }} @endif </td>
        <td><a href="{{ action('AdminUserController@edit', [$user->id]) }}">Edit</a></td>
      </tr>

      @endforeach
    </tbody>
  </table>



@endsection
