<?php

namespace Kanekescom\Siasn\Simpeg;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class SimpegServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->offerPublishing();

        $this->registerCommands();
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        // Register the service the package provides.
        $this->app->singleton(Simpeg::class, function ($app) {
            return new Simpeg;
        });

        $this->app->bind(\Kanekescom\Siasn\Simpeg\Repositories\DataUtamaRepository::class, \Kanekescom\Siasn\Simpeg\Repositories\DataUtamaRepositoryEloquent::class);
        $this->app->bind(\Kanekescom\Siasn\Simpeg\Repositories\ReferensiUnorRepository::class, \Kanekescom\Siasn\Simpeg\Repositories\ReferensiUnorRepositoryEloquent::class);
        $this->app->bind(\Kanekescom\Siasn\Simpeg\Repositories\RiwayatJabatanRepository::class, \Kanekescom\Siasn\Simpeg\Repositories\RiwayatJabatanRepositoryEloquent::class);
    }

    /**
     * Offer publishing.
     */
    protected function offerPublishing(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        if (! function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            __DIR__.'/../database/migrations/create_siasn_simpeg_data_utama_table.php.stub' => $this->getMigrationFileName('create_siasn_simpeg_data_utama_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/migrations/create_siasn_simpeg_referensi_unor_table.php.stub' => $this->getMigrationFileName('create_siasn_simpeg_referensi_unor_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/migrations/create_siasn_simpeg_riwayat_jabatan_table.php.stub' => $this->getMigrationFileName('create_siasn_simpeg_riwayat_jabatan_table.php'),
        ], 'migrations');
    }

    /**
     * Register commands.
     */
    protected function registerCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Commands\PullDataUtama::class,
            Commands\PullReferensiUnor::class,
            Commands\PullRiwayatJabatan::class,
        ]);
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     */
    protected function getMigrationFileName(string $migrationFileName): string
    {
        $timestamp = date('Y_m_d_His');

        return collect([$this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR])
            ->flatMap(function ($path) use ($migrationFileName) {
                $filesystem = $this->app->make(Filesystem::class);

                return $filesystem->glob($path.'*_'.$migrationFileName);
            })
            ->push($this->app->databasePath()."/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}
