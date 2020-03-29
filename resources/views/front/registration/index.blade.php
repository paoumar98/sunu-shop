@extends('front.layouts.master')

@section('content')

    <div class="row">

    <div class="col-md-12" id="register">

        <div class="card col-md-8">
            <div class="card-body">
                <h2 class="card-title">S'inscrire</h2>
                <hr>

                @if ( $errors->any() )

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                <form action="/user/register" method="post">

                    @csrf

                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" placeholder="Nom" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse:</label>
                        <textarea name="address" placeholder="Adresse" id="address" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-info col-md-2"> S'inscrire</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection