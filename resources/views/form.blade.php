@extends('navbar')

@section('title', 'Laravel Form')

@section('content')
<div class="container mt-5">
    <h2>Laravel Form</h2>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('productform') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <label for="marks">Marks:</label>
                    <input type="text" class="form-control" id="marks" name="marks" value="{{ old('marks') }}">
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-md-6">
            <table class="table table-striped table-hover table-reflow">
                <thead>
                    <tr>
                        <th><strong>Id</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Address</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Marks</strong></th>
                        <th><strong>
                            Action
                        </strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Product as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->email }}</td>
                            <td>{{ $product->address }}</td> <!-- Assuming you have a 'surname' column -->
                            <td>{{ $product->password }}</td> <!-- Assuming you have a 'surname' column -->
                            <td>{{ $product->marks }}</td> <!-- Assuming you have a 'surname' column -->
                            <td>
                                <a href="{{ route('updateform', ['id' => $product->id]) }}">Update</a>
                                <form method="POST" action="{{ route('deletedata', [$product->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
