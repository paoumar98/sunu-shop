@extends('front.layouts.master')

@section('style')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

        <h2 class="mt-5"><i class="fa  fa-credit-card-alt"></i> Caisse</h2>
        <hr>

        <div class="row">

            <div class="col-md-7">

                @if (session()->has('msg'))
                    <div class="alert alert-success">
                        {{ session()->get('msg') }}
                    </div>
                @endif

                <h4>Details de la Facture</h4>

                <form method="post" id="payment-form" action="{{ route('checkout') }}">

                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Adresse">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" placeholder="Province">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="postal">Postal</label>
                            <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                    </div>
                    <hr>


                    <button type="submit" class="btn btn-outline-info col-md-12">Completer la commande</button>
                </form>

            </div>

            <div class="col-md-5">

                <h4>Votre Commande</h4>

                <table class="table your-order-table">
                    <tr>
                        <th>Image</th>
                        <th>Details</th>
                        <th>Quantite</th>
                    </tr>

                    @foreach (Cart::instance('default')->content() as $item )
                    <tr>
                        <td><img src="{{ url('/uploads') . '/'. $item->model->image }}" alt="" style="width: 4em"></td>
                        <td>
                            <strong>{{ $item->model->name }}</strong><br>
                            {{ $item->model->description }} <br>
                            <span class="text-dark">{{ $item->total() }} FCFA</span>
                        </td>
                        <td>
                            <span class="badge badge-light">{{ $item->qty }}</span>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <hr>
                <table class="table your-order-table table-bordered">
                    <tr>
                        <th colspan="2">Prix Details</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>{{ Cart::subtotal() }} FCFA</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>{{ Cart::tax() }} FCFA</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>{{ Cart::total() }} FCFA</th>
                    </tr>

                </table>

            </div>
        </div>

    <div class="mt-5"><hr></div>

@endsection

@section('script')
@endsection