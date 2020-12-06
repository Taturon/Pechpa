<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Schema::defaultStringLength(191);
		$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
		if (strpos($uri, '/admin/') === false || $uri === '/admin') {
			config([
				'session.cookie' => config('admin_session.cookie'),
				'session.table' => config('admin_session.table'),
			]);
		}
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
			\App\Repositories\Answer\AnswerRepositoryInterface::class,
			\App\Repositories\Answer\AnswerRepository::class
		);
	}
}
