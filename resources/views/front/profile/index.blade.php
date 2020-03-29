@extends('front.layouts.master')

@section('content')

    <h2>Profil</h2>
    <hr>

    <h3>{{ $user->name }} Info</h3>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="2">Information <a href="" class="pull-right"><i class="fa fa-cogs"></i> Editer</a></th>
        </tr>
        </thead>
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{ $user->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Inscrit le</th>
            <td>{{ $user->created_at}}</td>
        </tr>
    </table>


    <h4 class="title">Commandes</h4>
    <hr>
    <div class="content table-responsive table-full-width">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produit</th>
                <th>Quantite</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach ($user->order as $order)
                    <td>{{ $order->id }}</td>
                    <td>
                        @foreach ($order->products as $item)
                            <table class="table">
                                <tr>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($order->orderItems as $item)
                            <table class="table">
                                <tr>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($order->orderItems as $item)
                            <table class="table">
                                <tr>
                                    <td>${{ $item->price }}</td>
                                </tr>
                            </table>
                        @endforeach
                    </td>

                    <td>
                        @if ($order->status)
                            <span class="badge badge-success">Confirmé</span>
                        @else
                            <span class="badge badge-warning">En Attente</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/user/order') . '/' . $order->id }}" class="btn btn-outline-dark btn-sm">Details</a>
                    </td>
            </tr>
            @endforeach


            </tbody>
        </table>

    </div>

@endsection