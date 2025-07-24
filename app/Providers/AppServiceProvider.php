<?php

namespace App\Providers;

use App\Modifiers\ShippingModifier;
use Illuminate\Support\ServiceProvider;
use Lunar\Admin\Support\Facades\LunarPanel;
use Lunar\Base\ShippingModifiers;
use Lunar\Shipping\ShippingPlugin;
use Livewire\Livewire;
use App\Admin\CustomLunarPanel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Reemplaza el panel original por tu versión personalizada
        $this->app->bind(
            LunarPanel::class,
            CustomLunarPanel::class
        );

        CustomLunarPanel::register();

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(ShippingModifiers $shippingModifiers): void
    {
        $shippingModifiers->add(
            ShippingModifier::class
        );

        \Lunar\Facades\ModelManifest::replace(
            \Lunar\Models\Contracts\Product::class,
            \App\Models\Product::class,
            // \App\Models\CustomProduct::class,
        );

        // Registra tus componentes Livewire aquí
        //
        // Si está en subcarpeta Components:
        Livewire::component('components.form-contact', \App\Livewire\Components\FormContact::class);
    }
}
