<?php
/**
 * User: Reindert Vetter
 * Date: 07/09/2018
 */

namespace LaravelDocumentor\Contract;


interface OpenApiArrayInterface
{
    public function toOpenApi(): array;
}