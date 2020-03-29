@extends('admin.layouts.master')

@section('page')
    Details Commandes
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{ $orders[0]->user->name }}Details des commandes</h4>
                    <p class="category">Liste des commandes</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Commande Id</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach ($orders as $order)
                            <tr>

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
                                                <td>{{ $item->price }} FCFA</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                </td>


                                <td>
                                    @if($order->status)
                                        <span class="label label-success">Confirmé</span>
                                    @else
                                        <span class="label label-warning">En attente</span>
                                    @endif
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