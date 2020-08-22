    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 20px;">Nombre</th>
                <th style="width: 20px;">Categoría</th>
                <th style="width: 20px;">Marca</th>
                <th style="width: 20px;">Tipos</th>
                <th style="width: 20px;">Stock</th>
                <th style="width: 20px;">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
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