@extends('admin.layouts.master')

@section('page')
    Utilisateurs
@endsection

@section('content')

    <div class="row">
        <div class="btn btn-info" style="margin: 15px; float:right;">
                <a href="{{ url('/admin/clients/pdf') }}">PDF</a>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Utilisateurs</h4>
                    <p class="category">Liste des utilisateurs inscrits</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Inscrit le</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success ti-close" title="Block User"></button>

                                   {{ link_to_route('users.show', 'Details', $user->id, ['class'=>'btn btn-success btn-sm']) }}

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection