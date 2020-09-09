<html>

    <head>
        <link rel="stylesheet" href="{{ public_path().'/css/bootstrap.min.css'}}" type="text/css"></link>
    </head>

    <img src="{{ public_path().'/assets/img/Logo.png'}}" alt="" style="width: 80px;">

    <div>
        <h4 class="text-center">Productos</h4>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Tipos</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
            @foreach(App\Product::with("category", "brand", "productTypeSizes", "productTypeSizes.type", "productTypeSizes.size")->has("category")->has("brand")->has("productTypeSizes")->has("productTypeSizes.type")->has("productTypeSizes.size")->get() as $product)
                <tr style="background-color: rgba(0,0,0,.075);">
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->category->name }}
                    </td>
                    <td>
                        {{ $product->brand->name }}
                    </td>
                    <td colspan="3">
                    
                    </td>
                </tr>
                
                @foreach($product->productTypeSizes as $productTypeSize)
                    <tr>
                        <td colspan="4">
                        </td>
                        <td>
                            @if($productTypeSize->type)
                                {{ $productTypeSize->type->name }} 
                            @endif
                            @if($productTypeSize->size)
                            - {{ $productTypeSize->size->name }}oz
                            @endif
                        </td>
                        <td>
                            {{ $productTypeSize->stock }}
                        </td>
                        <td>
                            $ {{ number_format($productTypeSize->price, 0, ",", ".") }}
                        </td>
                    </tr>
                @endforeach
            
            @endforeach
        </tbody>
    </table>
</html>