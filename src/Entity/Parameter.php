<?php declare(strict_types=1);
/**
 * User: Reindert Vetter
 * Date: 07/09/2018
 */

namespace LaravelDocumentor\Entity;


use LaravelDocumentor\Contract\OpenApiArrayInterface;

class Parameter implements OpenApiArrayInterface
{
    const IN_QUERY = 'query';
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $in;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var bool
     */
    protected $required = true;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var string
     */
    protected $collectionFormat;

    /**
     * @var string
     */
    private $value;

    public function __construct(string $in, string $name, string $value)
    {
        $this->in = $in;
        $this->name = $name;
        $this->value = $value;
    }

    public function toOpenApi(): array
    {
        $data = [
            'name' => $this->name,
            'in' => $this->in,
            'description' => $this->description,
            'required' => true,
            'type' => "string",
        ];

        if (! empty($this->items)) {
            $data['items'] = $this->items;
            $data['collectionFormat'] = $this->collectionFormat = "multi";
        }

        return $data;
    }
}