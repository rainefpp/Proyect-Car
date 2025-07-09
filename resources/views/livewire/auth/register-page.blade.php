<style>
    .boton-registro:hover{
            background-color: #FF8C16 !important;        
    }
</style>
<div style="background:#DFE0E0 " class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
    <div class="" style="max-width: 365px; margin: auto; background-color: #F7F7F7; padding: 32px; border-radius: 16px; margin-bottom: 20px;aligment-self: center;">
        <img src="{{ asset('images/logos/carzone-logo.png') }}" class="w-24 mx-auto mb-6" alt="CarZone Logo">
    <h1 style="font-family: Inter; font-size: 33.18px; font-style: normal; font-weight: 700; line-height: normal; margin-bottom: 20px" class="text-2xl font-bold mb-6">Registro</h1>
    <form wire:submit.prevent="register" class="space-y-4">
        <div>
            <input id="name" type="text" wire:model.defer="name" class="w-full border rounded p-2" placeholder="Ingresa tu nombre">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
       
            <input id="email" type="email" wire:model.defer="email" class="w-full border rounded p-2" placeholder="Correo electronico">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <input id="password" type="password" wire:model.defer="password" class="w-full border rounded p-2"placeholder="Contraseña">
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <input id="password_confirmation" type="password" wire:model.defer="password_confirmation" class="w-full border rounded p-2"placeholder="Confirme Contraseña" >
        </div>
        <button style ="background: #FFA74D " type="submit" class="w-full bg-indigo-600 text-white py-2 rounded boton-registro ">Registrarse</button>
        <div class="mt-4 text-center text-sm text-gray-600">
            ¿Ya tienes cuenta?
            <a href="#" onclick="window.dispatchEvent(new CustomEvent('abrir-login-modal'))" class="text-indigo-600 hover:underline ml-1">Inicia sesión</a>
        </div>
    </form>
</div>
</div>
