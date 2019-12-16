<form method="POST" enctype="multipart/form-data" action="{{$action ?? ''}}">
    @if(\Illuminate\Support\Facades\Route::currentRouteName() =='product.edit')
        @method('PUT')
    @endif
    @csrf
    <div class="form-group row align-content-center" style="position: relative">
        @isset($action)
            <label class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue"
                   style="position: absolute; left: 43%; top: 85%">
                <input id="image" class="@error('image') is-invalid @enderror" type="file" name="image"
                       value="@if($errors->any()){{old('image')}}@endif"
                       style="display: none;">
            </label>
        @endisset
        <img id="preview" class="rounded-circle m-auto" style="width: 130px;height: 130px"
             src="@if(isset($product->image) && !empty($product->image)){{asset('img/'.$product->image)}}@else{{asset('img/item_icon.png')}}@endif">
        @if(!isset($action))
            <div class="col-md-12 text-center">
                <label class="btn btn-danger fas fa-trash-alt">
                    <input data-toggle="modal" data-target="#deleteAlert" class="d-none"> Eliminar
                </label>
            </div>
            @include('products.modal_delete')
        @endif
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="name" class="col-md-12 col-form-label text-left">{{ __('Nombre del producto') }}:</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   placeholder="{{__('Ingresa el nombre del producto.')}}" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('name')}}@else{{ $product->name ?? ''}}@endif"
                   required autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="description"
                   class="col-md-12 col-form-label text-left">{{ __('Descripción') }}:</label>
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                   placeholder="{{__('Ingresa la descripción del producto.')}}"
                   name="description" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('description')}}@else{{ $product->description ?? '' }}@endif"
                   required >

            @error('description')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="barcode"
                   class="col-md-12 col-form-label text-left">{{ __('Código de barra') }}:</label>
            <input id="barcode" type="text" class="form-control @error('productname') is-invalid @enderror"
                   placeholder="{{__('Ingresa el nombre de usuario sin espacios.')}}"
                   name="barcode" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('barcode')}}@else{{$product->barcode ?? ''}}@endif"
                   required >
            @error('barcode')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>


        <div class="col-md-6">
            <label for="cost" class="col-md-12 col-form-label text-left">{{ __('Costo') }}:</label>
            <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror"
                   placeholder="{{__('Ingresa el costo del producto.')}}" @if(!isset($action)) readonly @endif
                   value="@if($errors->any()){{ old('cost')}}@else{{$product->cost ?? ''}}@endif"
                   name="cost" required>

            @error('cost')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="sale_price" class="col-md-12 col-form-label text-left">{{__('Precio de venta') }}:</label>
            <input id="sale_price" type="text" class="form-control @error('sale_price') is-invalid @enderror"
                   value="@if($errors->any()){{old('sale_price')}}@else{{$product->sale_price ?? ''}}@endif"
                   placeholder="{{__('Ingresa el precio de venta del producto.')}}"
                   name="sale_price" @if(!isset($action)) readonly @endif required>
            @error('sale_price')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="in_stock"
                   class="col-md-12 col-form-label text-left">{{ __('En existencia') }}:</label>
            <input id="in_stock" type="text" @if(!isset($action)) readonly @endif
                   class="form-control @error('in_stock') is-invalid @enderror"
                   placeholder="{{__('Ingresa la cantidad en existencia.')}}"
                   value="@if($errors->any()){{old('in_stock')}}@else{{$product->in_stock ?? ''}}@endif"
                   name="in_stock" required>

            @error('in_stock')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="brand" class="col-md-12 col-form-label text-left">{{ __('Marca') }}:</label>
            <input id="brand" type="text" maxlength="100" @if(!isset($action)) readonly @endif
                   class="form-control @error('brand') is-invalid @enderror"
                   placeholder="{{__('Ingresa la marca del producto.')}}"
                   value="@if($errors->any()){{ old('brand')}}@else{{$product->brand ?? ''}}@endif"
                   name="brand" required>

            @error('brand')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="supplier_id"
                   class="col-md-12 col-form-label text-left">{{ __('Proveedor') }}:</label>
            <select class="form-control" name="supplier_id" @if(!isset($action)) readonly @endif>
                @foreach($suppliers as $supplier)
                    <option @if(isset($product) && $supplier->id == $product->supplier->id) selected
                            @endif value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>

            @error('supplier')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="product_category_id"
                   class="col-md-12 col-form-label text-left">{{ __('Categoría') }}:</label>
            <select class="form-control" name="product_category_id" @if(!isset($action)) readonly @endif>
                @foreach($categories as $category)
                    <option @if(isset($product) && $category->id == $product->category->id) selected
                            @endif value="{{$category->id}}">{{$category->description}}</option>
                @endforeach
            </select>

            @error('categorie')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            @isset($action)
                <button type="submit" class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-save"></i>
                </button>
            @else
                <button type="button" onclick="window.location.href='{{route('product.edit',$product->id)}}'"
                        class="my-float btn bg-primary">
                    <i class="fas fa-lg fa-edit"></i>
                </button>
            @endisset
        </div>
    </div>
</form>
