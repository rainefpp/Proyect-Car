<?php

namespace App\Admin;

use Lunar\Admin\Support\Facades\LunarPanel as BaseLunarPanel;
use Filament\Panel;
use Lunar\Shipping\ShippingPlugin; // Importa tu plugin existente

class CustomLunarPanel extends BaseLunarPanel
{
    public function panel(Panel $panel): Panel
    {
        // Configuración base de Lunar
        $panel = parent::panel($panel);

        // ===== AÑADE TUS PLUGINS EXISTENTES =====
        $panel->plugin([
            new ShippingPlugin(), // Mantiene tu plugin actual
        ]);

        // ===== EJEMPLO: AÑADIR MÁS PERSONALIZACIONES =====
        $panel
            ->navigationGroups([
                'Catálogo',
                'Comunicación', // Nuevo grupo
                'Configuración',
            ]);

        return $panel;
    }
}
