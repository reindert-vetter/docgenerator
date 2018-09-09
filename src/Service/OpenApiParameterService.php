<?php declare(strict_types=1);
/**
 * User: Reindert Vetter
 * Date: 07/09/2018
 */

namespace LaravelDocumentor\Service;


use Illuminate\Http\Request;
use LaravelDocumentor\Contract\DataInterface;
use LaravelDocumentor\Entity\Parameter;

class OpenApiParameterService extends DataInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * OpenApiQueryService constructor.
     * @param Request $request
     */
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function get(): array
    {
        $parameters = [];
        $query = $this->request->query();

        foreach ($query as $name => $value) {
            $parameters[] = (new Parameter(Parameter::IN_QUERY, $name, $value))->toOpenApi();
        }

        return $parameters;
    }
}