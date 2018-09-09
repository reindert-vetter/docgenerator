<?php declare(strict_types=1);
/**
 * User: Reindert Vetter
 * Date: 07/09/2018
 */

namespace LaravelDocumentor\Entity;


use LaravelDocumentor\Contract\OpenApiArrayInterface;

class RequestBody implements OpenApiArrayInterface
{
    /**
     * @var array
     */
    private $content;

    /**
     * RequestBody constructor.
     * @param array|object|string $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function toOpenApi(): array
    {
        $data = array_add([], 'content.application/json.schema',
            [
                'type' => 'object',
                'properties' => $this->getProperties($this->content),
            ]
        );

        return $data;
    }

    /**
     * @param array|string $data
     * @return array
     */
    private function getProperties($data)
    {
        if (is_array($data)) {
            $properties = [];

            foreach ($data as $subData) {
                $properties[] = $this->getProperties($subData);
            }

            return $properties;
        }

        if (is_object($data)) {
            $properties = [];

            foreach ($data as $name => $subData) {
                $properties[$name] = [
                    'type' => 'string'
                ];
            }

            return $properties;
        }

        return [
            $data => [
                'type' => 'string'
            ]
        ];
    }
}