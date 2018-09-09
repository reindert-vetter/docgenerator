<?php declare(strict_types=1);

use LaravelDocumentor\Service\OpenApiParameterService;
use LaravelDocumentor\Service\OpenApiRequestBodyService;
use PHPUnit\Framework\TestCase;

/**
 * User: Reindert Vetter
 * Date: 17/07/2018
 */
class OpenApiRequestBodyServiceTest extends TestCase
{

    public function test_one_request_body_data()
    {
        $request = (new Faker\Request())->setPath()->setContent((object)['name1' => 'value1']);
        $result = (new OpenApiRequestBodyService($request))->get();

        $expect = [
            'content' => [
                'application/json' => [
                    'schema' => [
                        'type' => 'object',
                        'properties' => [
                            'name1' => [
                                'type' => 'string',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertSame([$expect], $result);
    }

    /*public function test_data_with_one_item()
    {
        $item = (object)[
                'name' => 'Pixel',
            ];

        $request = (new Faker\Request())->setPath()->setContent(['data' => $item]);
        $result = (new OpenApiRequestBodyService($request))->get();

        $expect = array_add([], 'content.application/json.schema.data', $item);
        $this->assertSame([$expect], $result);
    }*/

    /* public function test_data_with_array_in_key()
     {
         $items = [
             (object)[
                 'name' => 'Pixel',
             ],
             (object)[
                 'name' => 'Storm',
             ],
         ];

         $request = (new Faker\Request())->setPath()->setContent(array_add([], 'data.dogs', $items));
         $result = (new OpenApiRequestBodyService($request))->get();

         $expect = array_add([], 'content.application/json.schema.data.dogs', $items);
         $this->assertSame([$expect], $result);
     }*/
}
