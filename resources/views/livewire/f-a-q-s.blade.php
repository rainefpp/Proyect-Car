<div style="background-color: #DFE0E0;   padding-bottom: 20px;">
   <div style="background-image: url('{{ asset('images/banners/banner-FAQS.png') }}'); " class="w-full tamañobannerfaq" >
   </div>
   <div style="margin-top:2%; " class="max-w-3xl px-4 py-10 mx-auto ">
    <h1 style="margin-bottom:5%; font-size: 47px;" class="mb-8 text-3xl font-bold text-center">Consulta nuestras preguntas frecuentes</h1>

    <div class="space-y-4">
        @foreach ($faqs as $index => $faq)
            <div x-data="{ open: false }" class="p-4 border rounded-lg shadow-sm divpregunta ">
                <button @click="open = !open"
                        class="flex items-center justify-between w-full text-left">
                    <span class="font-medium text-lg text-gray-800">
                        {{ $faq['Pregunta'] }}
                    </span>
                    <svg :class="open ? 'rotate-180' : ''"
                         class="w-5 h-5 transition-transform"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-transition class="mt-2 text-gray-600">
                    {{ $faq['respuesta'] }}
                </div>
            </div>
        @endforeach
    </div>
</div>

</div>
