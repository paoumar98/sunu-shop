@extends('admin.layouts.master')
@extends('layouts.master')

@section('page')
    Commandes
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">

            @include('admin.layouts.message')

            <div class="card">
                <div class="header">
                    <h4 class="title">Commandes</h4>
                    <p class="category">Listes des commandes</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach ($orders as $order)
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
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
                                    @if ($order->status)
                                        <span class="label label-success">Confirmé</span>
                                    @else
                                        <span class="label label-warning">En Attente</span>
                                    @endif
                                </td>

                            <td>

                                @if ($order->status)
                                    {{ link_to_route('order.pending','En Attente', $order->id, ['class'=>'btn btn-warning btn-sm']) }}
                                @else
                                    {{ link_to_route('order.confirm','Confirmé', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                @endif

                                {{ link_to_route('orders.show','Details', $order->id, ['class'=>'btn btn-success btn-sm']) }}

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