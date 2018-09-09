<?php declare(strict_types=1);

use LaravelDocumentor\Service\OpenApiParameterService;
use PHPUnit\Framework\TestCase;

/**
 * User: Reindert Vetter
 * Date: 17/07/2018
 */
class OpenApiParameterServiceTest extends TestCase
{
    public function test_one_parameter_query_data()
    {
        $request = (new Faker\Request(['par1' => 'value1']))->setPath();
        $result = (new OpenApiParameterService($request))->get();

        $this->assertCount(1, $result);
    }

    public function test_2_parameters_query_data()
    {
        $request = (new Faker\Request(['par1' => 'value1', 'par2' => 'value2']))->setPath();
        $result = (new OpenApiParameterService($request))->get();

        $this->assertCount(2, $result);
    }

    public function test_parameter_query_data()
    {
        $request = (new Faker\Request(['par1' => 'value1']))->setPath();
        $result = (new OpenApiParameterService($request))->get();

        $this->assertSame([[
            "name" => "par1",
            "in" => "query",
            "description" => "",
            "required" => true,
            "type" => "string"
        ]], $result);
    }
}
