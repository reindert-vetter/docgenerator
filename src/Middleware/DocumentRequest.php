<?php declare(strict_types=1);

namespace ReindertVetter\LaravelDocumentor\Middleware;

use \Illuminate\Support\ServiceProvider;
use Closure;

/**
 * User: Reindert Vetter
 * Date: 15/07/2018
 */
class DocumentRequest extends ServiceProvider
{
    /**
     * Create a new service provider instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application $app
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
    }

    /**
     * @param         $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * @param $request
     * @param $response
     */
    public function terminate(\Illuminate\Http\Request $request, \Illuminate\Http\Response $response)
    {
    }
}