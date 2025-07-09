<?php

namespace App\Livewire;

use Livewire\Component;

class FAQS extends Component
{

        public $faqs = [];
    public function mount()
    {
        $this->faqs=[
            [
            'Pregunta'=>'1. ¿Cuánto demora el envío?',
            'respuesta'=>'Los envíos dentro de la Región Metropolitana tardan entre 1 a 3 días hábiles. Para otras regiones, el plazo estimado es de 3 a 7 días hábiles, dependiendo del courier.'
        ],
        [
            'Pregunta'=>'2. ¿Puedo retirar en tienda?',
            'respuesta'=>'Sí, puedes seleccionar la opción de "Retiro en tienda" durante el proceso de compra. Te notificaremos cuando tu pedido esté listo para retirar.'
        ],
          [
            'Pregunta'=>'3. ¿Qué métodos de pago aceptan?',
            'respuesta'=>'Aceptamos pagos con tarjetas de crédito, débito, transferencias bancarias, y Webpay. También puedes usar MercadoPago.'
        ],
          [
            'Pregunta'=>'4. ¿Cómo puedo saber si un producto es compatible con mi auto?',
            'respuesta'=>'Puedes revisar la descripción del producto o escribirnos por WhatsApp o correo con los datos de tu vehículo. Nuestro equipo te ayudará a verificar la compatibilidad.'
        ],
          [
            'Pregunta'=>'5. ¿Hacen instalaciones?',
            'respuesta'=>'Sí, tienes hasta 10 días desde la recepción del pedido para solicitar una devolución, siempre que el producto esté sin uso y en su empaque original.'
        ],
          [
            'Pregunta'=>'7. ¿Qué hago si mi producto llegó dañado?',
            'respuesta'=>'Contáctanos inmediatamente enviando fotos del producto y del empaque. Gestionaremos el cambio o reembolso según el caso.'
        ],
          [
            'Pregunta'=>'8. ¿Puedo hacer seguimiento de mi pedido?',
            'respuesta'=>'Sí, al realizar tu compra recibirás un número de seguimiento que podrás consultar directamente en la web del courier.'
        ],
          [
            'Pregunta'=>'9. ¿Ofrecen garantía?',
            'respuesta'=>'Todos nuestros productos cuentan con garantía legal. Además, algunos productos tienen garantía extendida del fabricante (indicada en la descripción).'
        ],
          [
            'Pregunta'=>'10. ¿Cómo puedo contactar al servicio al cliente?',
            'respuesta'=>'Puedes escribirnos a nuestro WhatsApp, correo electrónico o completar el formulario de contacto. Te responderemos lo antes posible.'
        ]
          ];
    }  


    public function render()
    {
        return view('livewire.f-a-q-s');
    }
}
