@extends('admin.index')

@section('content')


<div class="form-group" style="margin: 5% 10%; align: justify;">

    {!! Form::open(['action' => 'AdminUserController@store', 'method' => 'POST', 'files' => true]) !!}

    @csrf

    <h2>{!! Form::label('create', 'Create User') !!}<br><br></h2>

    <div class="form-group">
        {!! Form::label('name', 'User Name: ') !!}
        {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    {!! Form::select('role_id', ['' => 'Choose User Role'] + $roles, ['class' => 'form-control']) !!}
    {!! Form::select('is_active', ['0' => 'Disactive', '1' => 'Active'], ['class' => 'form-control']) !!}
    {!! Form::file('file') !!}<br><br>

    {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}<br>

    @if (count($errors) > 0 )

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach
            </ul>

        </div>

    @endif


</div>

@endsection
