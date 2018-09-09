<?php declare(strict_types=1);

use Illuminate\Http\Response;
use LaravelDocumentor\Adapter\OpenApiAdapter;
use PHPUnit\Framework\TestCase;

/**
 * User: Reindert Vetter
 * Date: 17/07/2018
 */
class OpenApiAdapterTest extends TestCase
{
    public function test_uri()
    {
        $request = (new Faker\Request([]))->setPath();
        $response = new \Illuminate\Http\Response();
        $result = (new OpenApiAdapter($request, $response))->get();

        $this->assertArrayHasKey('paths', $result);
        $this->assertArrayHasKey('/pet', array_get($result, 'paths'));

    }

    public function test_uri_and_get_method()
    {
        $request = (new Faker\Request([]))->setPath();
        $response = new \Illuminate\Http\Response();
        $result = (new OpenApiAdapter($request, $response))->get();

        $this->assertArrayHasKey('get', array_get($result, 'paths./pet'));
    }

    public function test_uri_and_post_method()
    {
        $request = (new Faker\Request([]))->setPath();
        $request->setMethod('post');
        $response = new \Illuminate\Http\Response();
        $result = (new OpenApiAdapter($request, $response))->get();

        $this->assertArrayHasKey('post', array_get($result, 'paths./pet'));
    }

    public function test_one_parameter()
    {
        $request = (new Faker\Request([]))->setPath('pet', 'status=sold');
        $response = new \Illuminate\Http\Response();
        $result = (new OpenApiAdapter($request, $response))->get();

        $this->assertInternalType('array', array_get($result, 'paths./pet.get.parameters'));
    }

    public function test_status_ok()
    {
        $request = (new Faker\Request([]))->setPath();
        $response = new \Illuminate\Http\Response('', Response::HTTP_OK);
        $result = (new OpenApiAdapter($request, $response))->get();

        $this->assertArrayHasKey(200, array_get($result, 'paths./pet.get.responses'));
    }
}
