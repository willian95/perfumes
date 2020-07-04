@foreach($payments as $payment)


        <table class="table" style="font-size: 12px;">
            <tbody style="font-size: 12px;">
                <tr>
                    <td style="width: 30px;"><strong>Orden:</strong> {{ $payment->order_id }}</td>
                    <td style="width: 30px;"><strong>Usuario:</strong> {{ $payment->user->name }} - {{ $payment->user->email }}</td>
                    <td style="width: 30px;"><strong>Costo productos:</strong>$ {{ number_format($payment->total_products, 0, ",", ".") }}</td>
                    <td style="width: 30px;"><strong>Costo envío:</strong>$ {{ number_format($payment->shipping_cost, 0, ",", ".") }}</td>
                    
                </tr>
                <tr>
                    <td style="width: 30px;"><strong>Total:</strong>$ {{ number_format($payment->total, 0, ",", ".") }}</td>
                    <td style="width: 30px;"><strong>Tracking: </strong>{{ $payment->tracking }}</td>
                    <td style="width: 30px;"><strong>Dirección: </strong>{{ $payment->address }}</td>
                    <td style="width: 30px;"><strong>Status: </strong>{{ $payment->status }}</td>
                </tr>
                <tr>
                    <td style="width: 30px;"><strong>Status envío: </strong>{{ $payment->status_shipping }}</td>
                    <td style="width: 30px;"><strong>Fecha: </strong>{{ $payment->created_at->format("d-m-Y") }}</td>
                    <td style="width: 30px;"></td>
                    <td style="width: 30px;"></td>
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