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

class SiasnSimpegPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // config([
        //     'app.name' => config('siasn-simpeg.name'),
        // ]);

        return $panel
            ->default()
            ->id('siasn-simpeg')
            ->path(config('siasn-simpeg.filament.path'))
            ->domain(config('siasn-simpeg.filament.domain'))
            ->profile(isSimple: false)
            ->login()
            ->brandName(config('siasn-simpeg.filament.brandName'))
            ->brandLogo(config('siasn-simpeg.filament.brandLogo'))
            ->brandLogoHeight(config('siasn-simpeg.filament.brandLogoHeight'))
            ->favicon(config('siasn-simpeg.filament.favicon'))
            ->colors(config('siasn-simpeg.filament.colors'))
            ->darkMode(config('siasn-simpeg.filament.darkMode.enabled'))
            ->topbar(config('siasn-simpeg.filament.topbar.enabled'))
            ->topNavigation(config('siasn-simpeg.filament.topNavigation.enabled'))
            ->breadcrumbs(config('siasn-simpeg.filament.breadcrumbs.enabled'))
            ->databaseNotifications(config('siasn-simpeg.filament.databaseNotifications.enabled'))
            ->databaseNotificationsPolling(config('siasn-simpeg.filament.databaseNotifications.polling'))
            ->spa(config('siasn-simpeg.filament.spa.enabled'))
            ->unsavedChangesAlerts(config('siasn-simpeg.filament.unsavedChangesAlerts.enabled'))
            ->databaseTransactions(config('siasn-simpeg.filament.databaseTransactions.enabled'))
            ->sidebarCollapsibleOnDesktop(config('siasn-simpeg.filament.sidebarCollapsibleOnDesktop.enabled'))
            ->sidebarFullyCollapsibleOnDesktop(config('siasn-simpeg.filament.sidebarFullyCollapsibleOnDesktop.enabled'))
            ->navigation(config('siasn-simpeg.filament.navigation.enabled'))
            ->collapsibleNavigationGroups(config('siasn-simpeg.filament.collapsibleNavigationGroups.enabled'))
            ->navigationGroups(config('siasn-simpeg.filament.navigationGroups'))
            ->discoverResources(in: __DIR__.'/Filament/Resources', for: 'Kanekescom\\Siasn\\Simpeg\\Filament\\Resources')
            ->discoverPages(in: __DIR__.'/Filament/Pages', for: 'Kanekescom\\Siasn\\Simpeg\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: __DIR__.'/Filament/Widgets', for: 'Kanekescom\\Siasn\\Simpeg\\Filament\\Widgets')
            ->widgets([
                //
            ])
            ->plugins([
                \ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin::make()
                    ->usingPage(\Kanekescom\Siasn\Referensi\Filament\Pages\Backups::class),
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
            ]);
    }
}
