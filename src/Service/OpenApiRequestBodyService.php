<?php declare(strict_types=1);
/**
 * User: Reindert Vetter
 * Date: 07/09/2018
 */

namespace LaravelDocumentor\Service;


use Illuminate\Http\Request;
use LaravelDocumentor\Contract\DataInterface;
use LaravelDocumentor\Entity\Parameter;
use LaravelDocumentor\Entity\RequestBody;

class OpenApiRequestBodyService extends DataInterface
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
        $resultContent = [];
        $requestContent = $this->request->getContent();

        if (empty($requestContent)) {
            return $resultContent;
        }

        foreach ($requestContent as $name => $value) {
            $resultContent[] = (new RequestBody($requestContent))->toOpenApi();
        }

        return $resultContent;
    }
}