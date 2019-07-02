@extends('admin.index')

@section('content')

<div class="row" style="margin: 5% 10%;">

<div class="">

    <img src="{{ $user->image ? $user->image->title : 'http://placehold.it/400x400' }}" alt="" width="150">

</div><br>

<div class="" style="margin: 5% 10%; align: justify;">
<div class="form-group">

    {!! Form::model($user, ['action' => ['AdminUserController@update', $user->id], 'method' => 'PATCH', 'file' => true]) !!}

    @csrf

    <h2>{!! Form::label('create', 'Update User') !!}<br><br></h2>

    <div class="form-group">
        {!! Form::label('name', 'User Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::label('role_id', 'User Role: ') !!}
    {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}<br>
    {!! Form::label('is_active', 'Status: ') !!}
    {!! Form::select('is_active', ['0' => 'Disactive', '1' => 'Active'], null, ['class' => 'form-control']) !!}<br>

    {!! Form::file('file') !!}<br><br>

    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}<br>

    {!! Form::open(['action' => ['AdminUserController@destroy', $user->id], 'method' => 'DELETE']) !!}
    {!! Form::submit('Delete') !!}
    {!! Form::close() !!} <br>
</div>

<div class="row">

@if (count($errors) > 0 )

        <div class="row alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach
            </ul>

        </div>

    @endif


</div>
</div>

@endsection

