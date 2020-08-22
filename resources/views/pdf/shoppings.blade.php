<html>

    <head>
        <link rel="stylesheet" href="{{ public_path().'/css/bootstrap.min.css'}}" type="text/css"></link>
    </head>

    <img src="{{ public_path().'/assets/img/Logo.png'}}" alt="" style="width: 80px;">

    <div>
        <h4 class="text-center">Ventas</h4>
    </div>
    @foreach(App\Payment::with("productPurchases", "user", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.size")->has("productPurchases")->has("user")->has("productPurchases.productTypeSize")->has("productPurchases.productTypeSize.product")->has("productPurchases.productTypeSize.product.brand")->has("productPurchases.productTypeSize.type")->has("productPurchases.productTypeSize.size")->get() as $payment)


        <table class="table" style="font-size: 12px;">
            <tbody style="font-size: 12px;">
                <tr>
                    <td><strong>Orden:</strong> {{ $payment->order_id }}</td>
                    <td><strong>Usuario:</strong> {{ $payment->user->name }} - {{ $payment->user->email }}</td>
                    <td><strong>Costo productos:</strong>$ {{ number_format($payment->total_products, 0, ",", ".") }}</td>
                    <td><strong>Costo envío:</strong>$ {{ number_format($payment->shipping_cost, 0, ",", ".") }}</td>
                    
                </tr>
                <tr>
                    <td><strong>Total:</strong>$ {{ number_format($payment->total, 0, ",", ".") }}</td>
                    <td><strong>Tracking: </strong>{{ $payment->tracking }}</td>
                    <td><strong>Dirección: </strong>{{ $payment->address }}</td>
                    <td><strong>Status: </strong>{{ $payment->status }}</td>
                </tr>
                <tr>
                    <td><strong>Status envío: </strong>{{ $payment->status_shipping }}</td>
                    <td><strong>Fecha: </strong>{{ $payment->created_at->format("d-m-Y") }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Tamaño</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payment->productPurchases as $purchase)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $purchase->productTypeSize->product->name }}</td>
                        <td>{{ $purchase->productTypeSize->type->name }}</td>
                        <td>{{ $purchase->productTypeSize->size->name }}oz</td>
                        <td>{{ $purchase->amount }}</td>
                        <td>$ {{ number_format($purchase->price, 0, ",", ".") }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endforeach
</html>