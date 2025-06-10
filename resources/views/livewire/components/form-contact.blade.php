<section class="w-full sm:px-6 lg:px-8" style="background: var(--Primary-500, #365569);padding:0!important;">

    <!-- Contenedor principal modificado -->
    <div class="flex justify-between flex-nowrap lg:flex-col lg:gap-12" style="gap: 0;">

        <!-- Columna del formulario -->
        <div class="w-full lg:w-1/2 lg:order-1">
            <div class="px-12 py-12 sm:p-8 rounded-xl shadow-md">
                <h2 class="text-3xl font-bold text-white mb-6">Formulario de Contacto</h2>
                <p class="text-lg text-white mb-8">¿Tienes preguntas o necesitas ayuda para encontrar el vehículo ideal?
                </p>

                <form class="space-y-6" method="POST" action="/contact">
                    @csrf
                    <!-- Campos del formulario... -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-white mb-1">Nombre y
                            Apellido</label>
                        <input wire:model="name" type="text" id="nombre" placeholder="Franco Paredes Pardo"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="correo" class="block text-sm font-medium text-white mb-1">Correo
                            electrónico</label>
                        <input wire:model="email" type="email" id="correo" placeholder="fparedesp@ing.ucsc.cl"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="telefono" class="block text-sm font-medium text-white mb-1">Número
                            Telefónico</label>
                        <input wire:model="phone" type="tel" id="telefono" placeholder="9XX34XX2X"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="mensaje" class="block text-sm font-medium text-white mb-1">Mensaje</label>
                        <textarea wire:model="message" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>

        <!-- Columna de la imagen - modificada -->
        <div class="w-full lg:w-1/2 lg:order-2" style="padding: 0; margin: 0">
            <img src="images/banners/contact-form.png" alt="Imagen de contacto" style="padding: 0; margin: 0"
                class="w-full h-full object-cover">
        </div>
    </div>

</section>
