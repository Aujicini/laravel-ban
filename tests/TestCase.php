<?php

namespace Tests;

use Omatamix\LaravelBan\BansServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Setup the testing environment.
     *
     * @return void Returns nothing.
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
    }

    /**
     * Get the package service providers.
     *
     * @param \Illuminate\Foundation\Application $app The application.
     *
     * @return array Returns a list of service providers.
     */
    protected function getPackageProviders($app)
    {
        return [
            BansServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app The application.
     *
     * @return void Returns nothing.
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app The application.
     *
     * @return void Returns nothing.
     */
    protected function setUpDatabase($app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        include_once __DIR__ . '/../migrations/2021_07_07_144920_create_bans_table.php';
        include_once __DIR__ . '/../migrations/2021_07_07_135952_create_blacklists_table.php';
        (new \CreateBlacklistsTable())->up();
        (new \CreateBansTable())->up();
    }
}
