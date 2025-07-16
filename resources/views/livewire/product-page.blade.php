<section>
 <div class="w-full bg-blue-300 border border-black fondo1  ">
    <div class=" fondo1 contenedorproductos ">
    <!-- Div 1: ordena verticalmente imagenes secundarias -->
    <div style="grid-column: 1;" class=" bg-white border mr-4 fondo1 divgaleriavertical">
       @foreach ($this->images as $image)
                        <div class="aspect-w-1 aspect-h-1 "
                             wire:key="image_{{ $image->id }}">
                            <img loading="lazy "
                                 class="object-cover rounded-xl object-cover imagenVertical"
                                 src="{{ $image->getUrl('small') }}"
                                 alt="{{ $this->product->translateAttribute('name') }}" />
                        </div>                      
                    @endforeach
    </div>
    <!-- Div 2: sin estilo especial -->
    <div style="" class="bg-white border max-h-[60px] ml-4 fondo1 divimagenprincipal ">
                     @if ($this->image)
                    <div class="aspect-w-1 aspect-h-1 imagenprincipal">
                        <img class="object-cover rounded-xl "
                             src="{{ $this->image->getUrl('large') }}"
                             alt="{{ $this->product->translateAttribute('name') }}" />
                    </div>
                @endif
    </div>

    <!-- Div 3: ordena verticalmente -->
    <div style="" class="flex flex-col bg-white border border-black fondo1 derechaproducto ">
     <div class="flex items-center justify-between  textosdescripcion">
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

                <div class="flex mt-4 estrellas">
                 @for ($i = 0; $i < $this->product->translateAttribute('valoracion'); $i++)
                 <img src="{{ asset('images/productos/estrella.svg') }}" alt="estrella" class="estrellas">
                @endfor
                </div>

            <div class="flex justify-between mt-8  arreglosimagenes">
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
                <x-product-price class="mt-8 font-bold text-indigo-700 estrellas"
                :variant="$this->variant" />
                 <form class="mt-4">
                    <div class="space-y-4">
                        @foreach ($this->productOptions as $option)
                            <fieldset>
                                <legend class="text-xs font-medium text-gray-700">
                                    {{ $option['option']->translate('name') }}
                                </legend>

                                <div class="flex flex-wrap gap-2 mt-2 text-xs tracking-wide uppercase"
                                     x-data="{
                                         selectedOption: @entangle('selectedOptionValues').live,
                                         selectedValues: [],
                                     }"
                                     x-init="selectedValues = Object.values(selectedOption);
                                     $watch('selectedOption', value =>
                                         selectedValues = Object.values(selectedOption)
                                     )">
                                    @foreach ($option['values'] as $value)
                                        <button class="px-6 py-4 font-medium border rounded-lg focus:outline-none focus:ring"
                                                type="button"
                                                wire:click="
                                                $set('selectedOptionValues.{{ $option['option']->id }}', {{ $value->id }})
                                            "
                                                :class="{
                                                    'bg-indigo-600 border-indigo-600 text-white hover:bg-indigo-700': selectedValues
                                                        .includes({{ $value->id }}),
                                                    'hover:bg-gray-100': !selectedValues.includes({{ $value->id }})
                                                }">
                                            {{ $value->translate('name') }}
                                        </button>
                                    @endforeach
                                </div>
                            </fieldset>
                        @endforeach
                    </div>

                    <div class="max-w-xs mt-8">
                        <livewire:components.add-to-cart :purchasable="$this->variant"
                                                         :wire:key="$this->variant->id">
                    </div>
                </form>
    </div>
        @endif

 </div>
 <!-- boton pagar-->
 
  </div>
 
<div class="w-full bg-green-300 p-8 fondo1 textosdetalles">
    <div class="etiquetaDescipcion">
        <h4>Descripción</h4>
    </div>   
        {!!$this->product->translateAttribute('descripcio-larga')!!}

</div>
</section>    