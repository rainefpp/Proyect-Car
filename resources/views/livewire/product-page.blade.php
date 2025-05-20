<section>
 <div class="w-full bg-blue-300 p-4 border border-black fondo1">
    <div class="flex fondo1">
    <!-- Div 1: ordena verticalmente imagenes secundarias -->
    <div class="flex flex-col bg-white border mr-4 fondo1 ">
       @foreach ($this->images as $image)
                        <div class="aspect-w-1 aspect-h-1 max-h-[250px] my-2"
                             wire:key="image_{{ $image->id }}">
                            <img loading="lazy "
                                 class="object-cover rounded-xl object-cover max-h-[15px]my-2"
                                 src="{{ $image->getUrl('small') }}"
                                 alt="{{ $this->product->translateAttribute('name') }}" />
                        </div>                      
                    @endforeach
    </div>
    <!-- Div 2: sin estilo especial -->
    <div class="bg-white border border-blue max-h-[60px] ml-4 fondo1">
                     @if ($this->image)
                    <div class="aspect-w-1 aspect-h-1">
                        <img class="object-cover rounded-xl "
                             src="{{ $this->image->getUrl('large') }}"
                             alt="{{ $this->product->translateAttribute('name') }}" />
                    </div>
                @endif
    </div>
    
    
    <!-- Div 3: ordena verticalmente -->
    <div class="flex flex-col bg-white p-4 border border-black fondo1">
     <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold">
                        {{ $this->product->translateAttribute('name') }}
                    </h1>  
                </div>

                <p class="mt-1 text-sm text-gray-500">
                    {{ $this->variant->sku }}
                </p>

                <article class="mt-4 text-gray-700 interfont">
                    {!! $this->product->translateAttribute('description') !!}
                </article>
         

             

@if ( $this->product->productType?->name == "Autos")

                <div class="flex mt-4">
                 @for ($i = 0; $i < $this->product->translateAttribute('valoracion'); $i++)
                 <img src="{{ asset('images/productos/estrella.svg') }}" alt="estrella" class="">
                @endfor
                </div>

            <div class="flex justify-between mt-8">
                <div class="">
                    <img src="{{ asset('images/productos/engine.svg') }}" alt="motor" class="">
                      <h1 class="text-sm interfont ml-1 mt-1">
                      {{$this->product->translateAttribute('motor-cilindrada')}}cc
                      </h1> 
                </div>
                 <div>
                    <img src="{{ asset('images/productos/speed.svg') }}" alt="velocidad" class="ml-4">
                    <h1 class="text-sm interfont">
                    {{$this->product->translateAttribute('max-speed')}}
                    </h1> 
                </div>
                 <div>
                    <img src="{{ asset('images/productos/fuel.svg') }}" alt="fuel" class="ml-3">
                      <h1 class="text-sm interfont">
                    {{$this->product->translateAttribute('combustible')}}
                    </h1> 
                  
                </div>
                 <div>
                <img src="{{ asset('images/productos/tranmission.svg') }}" alt="transmission" class="ml-4">
                 <h1 class="text-sm interfont">
                    {{$this->product->translateAttribute('transmision')}}
                    </h1>
                </div>                                                
            </div>                 
                <x-product-price class="mt-8 font-bold text-indigo-700"
                :variant="$this->variant" />
    </div>
@endif

 </div>
  </div>
 
<div class="w-full bg-green-300 p-8">
 
        {!!$this->product->translateAttribute('descripcio-larga')!!}

</div>
</section>    