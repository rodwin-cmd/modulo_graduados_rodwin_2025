<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\ChartGraduados;
use App\Filament\Widgets\GraduadosConEventoChart;
use App\Filament\Widgets\GraduadosGeneroChart;
use App\Filament\Widgets\GraduadosResumen;
use App\Filament\Widgets\GradudosPerfil;
use App\Filament\Widgets\NivelSalarialChart;
use App\Filament\Widgets\NumberGraduadosWidget;
use App\Filament\Widgets\SectorChart;
use App\Filament\Widgets\TipoContratoChart;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('dashboard')
            ->path('dashboard')
            ->login()
            ->brandLogo(asset('assets/images/logoucp.png'))
            ->brandLogoHeight('4rem')
            ->darkModeBrandLogo(asset('assets/images/logoucp.png'))
            ->maxContentWidth('full')
            ->colors([
                'primary' => Color::Red,
                'gray'=>Color::hex('#66cc99'),
            ])
            ->font('Poppins')
            ->favicon('assets/images/ucp.webp')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->sidebarCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make('Panel Graduados')->icon('heroicon-o-academic-cap'),
                NavigationGroup::make('Panel Administrativo')->icon('heroicon-o-building-library'),
            ])
            ->pages([

            ])
            ->widgets([
                NumberGraduadosWidget::class,
                ChartGraduados::class,
                GradudosPerfil::class,
                GraduadosGeneroChart::class,
                GraduadosConEventoChart::class,
                TipoContratoChart::class,
                NivelSalarialChart::class,
                SectorChart::class,

            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    // register es una funcion que permite que el empaquetador Vit, registre los cambio más rápido
    public function register():void
    {
        parent::register();
        FilamentView::registerRenderHook('panels::body.end', fn(): string =>Blade::render("@vite('resources/js/app.js')"));
    }
}
