<div style="" class="sm:relative"
     x-data="{
         linesVisible: @entangle('linesVisible').live
     }">
     <link rel="stylesheet" href="css/custom.css">
    <button class="grid w-16 h-16 transition border-l border-gray-100 lg:border-l-transparent hover:opacity-75"
            x-on:click="linesVisible = !linesVisible">
        <span class="sr-only">Cart</span>

        <span class="place-self-center">
            <img style="width:25%" src="{{ asset('images/logos/iconoUsuario.svg')}}">
        </span>
    </button>

    <div class="absolute inset-x-0 top-auto z-50 w-screen max-w-sm px-6 py-8 mx-auto mt-4 bg-white border border-gray-100 shadow-xl sm:left-auto rounded-xl"
         x-show="linesVisible"
         x-on:click.away="linesVisible = false"
         x-transition
         x-cloak>
                <button class="absolute text-gray-500 transition-transform top-3 right-3 hover:scale-110"
                type="button"
                aria-label="Close"
                x-on:click="linesVisible = false">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>    
    <!--comienso del modal-->
    <div>
        @auth
    <p>Ya estás dentro, {{ Auth::user()->name }}</p>
        <button
        wire:click="logout"
        class="mt-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md  text-black font-semibold boton-login focus:outline-none focus:ring-2 focus:ring-red-500"
    >
        Cerrar sesión
    </button>
        @endauth

        @guest
            <div style="" class="registro">
           
                <img src="{{ asset('images/logos/carzone-logo.png') }}" class="imagen-circular" />
                
                <!-- Ejemplo de input para email en login de Breeze -->
<div>


    <div class="formulario-relleno">
        <form wire:submit.prevent="login" class="space-y-6">
    
    <h1 class="titulosecion">Iniciar sesión</h1>

  <label for="email" class="">Email</label>
  <input placeholder="Correo"  
        id="email" 
        name="email" 
        type="email" 
        required autofocus
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        wire:model.defer="form.email"
    @error('form.email')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror

<div class="mt-4">
    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
    <input 
        id="password" 
        name="password" 
        type="password" 
        required 
        autocomplete="current-password"
        wire:model.defer="form.password"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
    @error('form.password')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror

</div>
<!-- Botón para iniciar sesión -->
<div class="mt-6">
    <button style= "background-color: " type="submit"
        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md  text-white font-semibold boton-login focus:outline-none focus:ring-2">
        Iniciar sesión
    </button>
    <div class="mt-4 text-center text-sm text-gray-600">
    ¿No tienes cuenta?
    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline ml-1">Regístrate</a>
</div>
</div>
</form>     
</div> 
</div>
</div>
        @endguest
    </div>
<!--Fin del modal-->
    </div>

</div>
