<section class="w-full" style="background-color: #365569;padding:0!important;">

    <!-- Contenedor principal modificado -->
    <div class="grid gap-4 cont-form-contact" style="">

        <!-- Columna del formulario -->
        <div class="w-full lg:w-1/2 lg:order-1">
            <div class="px-12 py-12 sm:p-8 rounded-xl shadow-md">
                <h2 class="text-3xl font-bold text-white mb-6">Formulario de Contacto</h2>
                <p class="text-lg text-white mb-8">¿Tienes preguntas o necesitas ayuda para encontrar el vehículo ideal?
                </p>
                @if (session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="space-y-6" wire:submit.prevent="submit">
                    @csrf
                    <!-- Campos del formulario... -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-white mb-1">Nombre y
                            Apellido</label>
                        <input wire:model.lazy="name" type="text" id="nombre" placeholder="Franco Paredes Pardo"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="correo" class="block text-sm font-medium text-white mb-1">Correo
                            electrónico</label>
                        <input wire:model.lazy="email" type="email" id="correo" placeholder="fparedesp@ing.ucsc.cl"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="telefono" class="block text-sm font-medium text-white mb-1">Número
                            Telefónico</label>
                        <input wire:model.lazy="phone" type="tel" id="telefono" placeholder="9XX34XX2X"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="mensaje" class="block text-sm font-medium text-white mb-1">Mensaje</label>
                        <textarea wire:model.lazy="message" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('message')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="form-contact-btn">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>

        <!-- Columna de la imagen -- modificada -->
        <div class="w-full" style="padding: 0; margin: 0">
            <img src="images/banners/contact-form.png" alt="Imagen de contacto" style="padding: 0; margin: 0"
                class="w-full h-full object-cover">
        </div>
    </div>

</section>
