<?php

namespace Kanekescom\Siasn\Simpeg;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin;

class SiasnSimpegPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // config([
        //     'app.name' => config('siasn-simpeg.name'),
        // ]);

        return $panel
            ->default()
            ->path(config('siasn-simpeg.filament.path'))
            ->login()
            ->brandLogo(config('siasn-simpeg.filament.brandLogo'))
            ->favicon(config('siasn-simpeg.filament.favicon'))
            ->colors(config('siasn-simpeg.filament.colors'))
            ->topbar(config('siasn-simpeg.filament.topbar'))
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: __DIR__.'/Filament/Resources', for: 'Kanekescom\\Siasn\\Simpeg\\Filament\\Resources')
            ->discoverPages(in: __DIR__.'/Filament/Pages', for: 'Kanekescom\\Siasn\\Simpeg\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: __DIR__.'/Filament/Widgets', for: 'Kanekescom\\Siasn\\Simpeg\\Filament\\Widgets')
            ->topbar(config('siasn-simpeg.filament.topbar'))
            ->sidebarCollapsibleOnDesktop()
            ->widgets([
                //
            ])
            ->navigationGroups(config('siasn-simpeg.filament.navigationGroups'))
            ->plugin(FilamentSpatieLaravelBackupPlugin::make())
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
}
