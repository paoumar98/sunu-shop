@extends('admin.layouts.master')

@section('page')
    Editer un Produit
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-10 col-md-10">
            @include('admin.layouts.message')
            <div class="card">
                <div class="header">
                    <h4 class="title">Editer un Produit</h4>
                </div>

                <div class="content">
                    {!! Form::open(['url' => ['admin/products', $product->id], 'files'=>'true', 'method'=>'put']) !!}
                    <div class="row">
                        <div class="col-md-12">

                            @include('admin.products._fields')

                            <div class="form-group">
                                {{ Form::submit('Prodiut mis a jour', ['class'=>'btn btn-primary']) }}
                            </div>

                        </div>

                    </div>


                    <div class="clearfix"></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection