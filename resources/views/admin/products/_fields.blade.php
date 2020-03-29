<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('product_name', 'Nom du produit') }}
    {{ Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Nom du produit']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    {{ Form::label('price', 'Prix') }}
    {{ Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'2500']) }}
    <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
</div>


<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description',$product->description,['class'=>'form-control border-input','placeholder'=>'Description']) }}
    <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','Image') }}
    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('description') : '' }}</span>
</div>