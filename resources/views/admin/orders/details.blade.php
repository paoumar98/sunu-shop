@extends('admin.layouts.master')

@section('page')
    Details Commandes
@endsection


@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title"> Details Commandes</h4>
                    <p class="category"> Details Commandes</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Adresse</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->address }}</td>
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
                                @endif  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Details du client</h4>
                    <p class="category">Details du client</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <td>{{ $order->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Inscrit le</th>
                            <td>{{ $order->user->created_at->diffForHumans() }}</td>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title"> Details Produit</h4>
                    <p class="category">Produit(s)</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($order->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->price }}</td>
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
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td><img src="{{ url('uploads') . '/' . $product->image }}" alt="" style="width: 2em"></td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/admin/orders') }}" class="btn btn-success">Retour</a>
    
@endsection