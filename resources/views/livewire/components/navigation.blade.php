<header class="relative border-b border-gray-100 bg-white shadow-sm">
    <div class="flex items-center justify-between h-16 px-4 py-8 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
        <div class="flex items-center h-16">
            <a class="flex items-center flex-shrink-0"
               href="{{ url('/') }}"
               wire:navigate
            >
                <span class="sr-only">Home</span>
                <img class="" style="width:72%;" src="{{ asset('images/logos/carzone-logo.png')}}" alt="Logo"></img>
            </a>

            <nav class="hidden lg:gap-4 lg:flex lg:ml-8 mx-2">
                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Inicio </a>
                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Tienda </a>
                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Carrito </a>
                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Mi Cuenta </a>
                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Quiénes Somos </a>
                    <a class="text-sm font-medium transition hover:opacity-75" href="{{ route('faqs.view') }}"> Preguntas Frecuentes </a>
                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Contacto </a>
            </nav>
            <a class="text-sm text-white font-medium transition hover:opacity-75 rounded-lg px-8 py-1" style="background: var(--Secundary-500, #FFA74D); margin-left:10px;" href=""> Comprar Aquí </a>
        </div>


        <div class="flex items-center justify-between flex-1 ml-4 lg:justify-end">
            <x-header.search class="max-w-sm mr-4" />

            <div class="flex items-center -mr-4 sm:-mr-6 lg:mr-0">
                @livewire('components.cart')

                <div x-data="{ mobileMenu: false }">
                    <button x-on:click="mobileMenu = !mobileMenu"
                            class="grid flex-shrink-0 w-16 h-16 border-l border-gray-100 lg:hidden">
                        <span class="sr-only">Toggle Menu</span>

                        <span class="place-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </span>
                    </button>
                      <div class="flex items-center -mr-4 sm:-mr-6 lg:mr-0">
                          @livewire("auth.login-modal")
                    </div>

                    <div x-cloak
                         x-transition
                         x-show="mobileMenu"
                         class="absolute right-0 top-auto z-50 w-screen p-4 sm:max-w-xs">
                        <ul x-on:click.away="mobileMenu = false"
                            class="p-6 space-y-4 bg-white border border-gray-100 shadow-xl rounded-xl">
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Inicio </a>
                                </li>
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Tienda </a>
                                </li>
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Carrito </a>
                                </li>
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Mi Cuenta </a>
                                </li>
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Quiénes Somos </a>
                                </li>
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Preguntas Frecuentes </a>
                                </li>
                                <li>
                                    <a class="text-sm font-medium transition hover:opacity-75" href=""> Comprar Aquí </a>
                                </li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
    </div>
</header>
