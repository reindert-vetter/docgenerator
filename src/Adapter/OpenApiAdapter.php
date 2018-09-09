<?php declare(strict_types=1);
/**
 * User: Reindert Vetter
 * Date: 02/09/2018
 */

namespace LaravelDocumentor\Adapter;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LaravelDocumentor\Contract\ConverterInterface;

class OpenApiAdapter implements ConverterInterface
{
    const KEY_RESPONSES = 'responses';

    const KEY_PATHS = 'paths';

    const KEY_PREFIX_PATH = '/';

    const KEY_PARAMETERS = 'parameters';

    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        /**
         * @todo get status
         */
        $parameters = [];
        if ($this->request->getQueryString()) {
            $parameters = [
                self::KEY_PARAMETERS => [$this->request->getQueryString()]
            ];
        }

        $responses = [
            self::KEY_RESPONSES => [
                $this->response->getStatusCode() => ['schema' => ['']]
            ]
        ];
        $data = $parameters + $responses;

        return [
            self::KEY_PATHS => [
                self::KEY_PREFIX_PATH . $this->request->path() => [
                    strtolower($this->request->method()) => $data
                ],
            ],
        ];
    }
}