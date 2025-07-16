<div class="sm:relative"
     x-data="{ linesVisible: @entangle('linesVisible').live }">
    <link rel="stylesheet" href="css/custom.css">
    <button class="boton-contraseña"
            style="margin:1rem;"
            x-on:click="linesVisible = !linesVisible">
        <span class="sr-only">Cart</span>
        <span class="place-self-center">
            <p style="font-size: 25px; color:rgb(255, 255, 255);">editar</p>
        </span>
    </button>

    <div class="modal-overlay"
         x-show="linesVisible"
         x-on:click.away="linesVisible = false"
         x-transition
         x-cloak>
        <div class="modal-content">
            <button style="position:absolute;top:12px;right:12px;color:#888;cursor:pointer;background:none;border:none;font-size:18px;"
                    type="button"
                    aria-label="Close"
                    x-on:click="linesVisible = false; setTimeout(() => window.location.reload(), 150)">
                &times;
            </button>
            <!--comienso del modal-->
            <div class="">
                @auth
                    <form wire:submit.prevent="updateProfile">
                        <div>
                             <h2 style="margin-bottom: 2rem; 
                color: #000;
                font-family: Inter;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;">Actualizar Nombre y correo</h2>
                            
                            <input style="border-radius:10px;"placeholder ="Nombre" id="name" type="text" wire:model.defer="name" />
                            @error('name') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror
                        </div>
                        <div style="margin-top: 1rem;">
                           
                            <input style="border-radius:10px;" placeHolder="Correo" id="email" type="email" wire:model.defer="email" />
                            @error('email') <span style="color:red;font-size:12px;">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" style="margin-top: 1rem;" class="boton-contraseña">
                            Confirmar
                        </button>
                        @if (session()->has('success'))
                            <div style="color: green; margin-top: 1rem;">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
            <div style="" class="modalforms">
                <h2 style="margin-top: 2rem; font-size: 1.5rem; 
                color: #000;
                font-family: Inter;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;">Actualizar contraseña</h2>

                <form wire:submit.prevent="updatePassword">
                <input style="margin-bottom: 1rem; margin-top: 1rem; border-radius:10px; " type="password" placeholder="Contraseña actual" wire:model.defer="current_password">
                @error('current_password') <span>{{ $message }}</span> @enderror

                <input style="margin-bottom: 1rem; border-radius:10px;" type="password" placeholder="Contraseña nueva" wire:model.defer="new_password">
                @error('new_password') <span>{{ $message }}</span> @enderror

             
                <input style="margin-bottom: 1rem; border-radius:10px;" type="password" placeholder="Confirmar contraseña nueva" wire:model.defer="new_password_confirmation">

                <button class="boton-contraseña" type="submit">Actualizar contraseña</button>
                <button class="boton-cancelar" type="botton" x-on:click="linesVisible = false;">Cancelar</button>
                @if (session()->has('success'))
                    <div>{{ session('success') }}</div>
                @endif
                </form>
            </div>
                @endauth
            </div>
            <!--Fin del modal-->
        </div>
    </div>
</div>

<script>
    window.addEventListener('recargar-pagina', () => {
        window.location.reload();
    });
</script>