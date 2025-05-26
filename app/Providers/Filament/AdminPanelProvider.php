<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use App\Models\Team;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use App\Filament\Pages\Tenancy\RegisterTeam;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('')
            ->login()
            ->colors([
                'primary' => '#096B68',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
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
            ])
            ->font('Nunito')
            ->spa()
            ->sidebarWidth('17rem')
            ->maxContentWidth('full')
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Produk')
                    ->icon('heroicon-o-shopping-cart'),
                NavigationGroup::make()
                    ->label('Transaksi')
                    ->icon('heroicon-o-pencil'),
                NavigationGroup::make()
                    ->label('Master Data')
                    ->icon('heroicon-o-pencil'),
                NavigationGroup::make()
                    ->label('Settings')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsed(),
            ])
            ->sidebarFullyCollapsibleOnDesktop()

            // TEAM
            ->tenant(Team::class)
            ->tenantRegistration(RegisterTeam::class)
        ;
    }
}
