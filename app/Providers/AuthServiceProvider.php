<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Produto;
use App\Policies\ProdutoPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //Produto::class => ProdutoPolicy::class,
        'App\Models\Produto' => 'App\Policies\ProdutoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('ver-produto', function(User $user, Produto $produto){
            return $user->id == $produto->id_user;
        });
    }
}
