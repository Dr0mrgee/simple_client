<?php

namespace Vault\SimpleClient;

use Illuminate\Support\ServiceProvider;

class SimpleClientServiceProvider extends ServiceProvider
{
  
    // protected $defer = false;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
      /**
       * 
       * Optional methods to load your package assets
       * 
       */
      // $this->loadMigrationsFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'database/migrations');
      // $this->loadRoutesFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'routes/web.php');
      // $this->loadRoutesFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'routes/vault.php');
      // $this->loadViewsFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'resources/views', 'simple_client' );
      // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'simple_client');
      $this->publishes([
        dirname( __DIR__ ) .DIRECTORY_SEPARATOR. 'config/simple_client.php' => config_path( 'simple_client.php' ),
      ], 'config');


      // if ($this->app->runningInConsole()) {
        //   $this->publishes([
        //       __DIR__.'/../config/simple_client.php' => config_path( 'simple_client.php' ),
        //     ], 'config');

        // // Publishing the views.
        //   /*$this->publishes([
        //     __DIR__.'/../resources/views' => resource_path( 'views/vendor/simple_client' ),
        //   ], 'views' );*/

        // // Publishing assets.
        // /*$this->publishes([
        //   __DIR__.'/../resources/assets' => public_path( 'vendor/simple_client' ),
        // ], 'assets' );*/

        // // Publishing the translation files.
        //   /*$this->publishes([
        //     __DIR__.'/../resources/lang' => resource_path( 'lang/vendor/simple_client' ),
        //   ], 'lang' );*/

        // Registering package commands.
        // $this->commands([
        //   Console\Commands\SimpleClient::class
        // ]);
      // }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
      // Automatically apply the package configuration
      $this->mergeConfigFrom( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'config/simple_client.php', 'simple_client') ;

      // Register the main class to use with the facade
      $this->app->singleton( 'simple_client', function () {
        return new SimpleClient();
      });

      // Bind to main package class
      $this->app->bind( 'SimpleClient', function () {
     	  return new Vault\SimpleClient\SimpleClient();
      });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
      return [
        // 'simple_client',
        'SimpleClient', 
      ];
    }

}
