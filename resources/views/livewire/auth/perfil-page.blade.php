<div>
    <div class="divPerfil">
        <div class="divperfildatos">
            <h1 class="h2titulos">1. Perfil de Usuario</h1>
                <div class="datosperfil">
                        <h3 class="h3perfil"><strong>Nombre:</strong> {{ auth()->user()->name }}</h3>
                        <p class="pperfil"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        
                    <div class="Lapiz">
                        @livewire("auth.updateperfil")
                    </div>  
                </div>
            <div class="divpedidos">
                <h1 class="h2titulos">2.Mis pedidos</h1>
                @if ($orders)
                   <table class="tableperfil">
                    <thead class="bg-gray-100 text-gray-700 uppercase">
                        <tr>
                            <th class="px-4 py-2 border-b" >ID</th>
                            <th class="px-4 py-2 border-b" >Fecha</th>
                             @foreach ($orders as $order)
                                @foreach ($order->lines as $line)
                                <th class="px-4 py-2 border-b" >Producto</th>     
                                @endforeach
                            @endforeach
                            <th class="px-4 py-2 border-b" >Total</th>
                            <th class="px-4 py-2 border-b" >Estado</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr ">
                            <td style="text-align: center;" class="px-4 py-2 border-b" >{{ $order->id }}</td>
                            <td style="text-align: center;" class="px-4 py-2 border-b" >{{ $order->created_at->format('d/m/Y') }}</td>
                        @foreach ($order->lines as $line) <td style="text-align: center;" class="px-4 py-2 border-b"> {{ $line->description }}</td>@endforeach
                            <td style="text-align: center;" class="px-4 py-2 border-b" >{{ $order->total->formatted}}</td>
                            <td style="text-align: center;" class="px-4 py-2 border-b" >{{ $order->status }}</td>
                
                       {{--@foreach ($order->lines as $line )
                             <div>
                                Producto: {{ $line->description }}<br>
                                Cantidad: {{ $line->quantity }}<br>
                                Precio: {{ $line->unit_price->formatted }}
                            </div>
                            @endforeach--}}
                    
                      
                    </tbody>
                 </table>    
                 
                <div class="metodosDePago" style="margin-top: 2rem; margin-bottom: 2rem;">
                    <h1 class="h2titulos">3.Metodos de Pago</h1>
                    @foreach($orders as $order)
                        @forelse ($order->transactions as $transaction )
                            <div>
                                Método de pago: {{ $transaction->driver }}<br>
                                Estado: {{ $transaction->status }}<br>
                                Monto: {{ $transaction->amount->formatted ?? $transaction->amount }}
                            </div> 
                        @empty
                             <p>No hay metodo de pago registrado para esta orden.</p>
                        @endforelse($order->transactions as $transaction)                                        
                        @endforeach
                </div>
                @else
                    <p style="margin-top: 1rem;" class="pperfil">No tienes pedidos realizados.</p>
                @endif
               
            </div>        
        </div>
    </div>
</div>



