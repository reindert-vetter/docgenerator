<?php
/**
 * User: Reindert Vetter
 * Date: 15/07/2018
 */

namespace ReindertVetter\LaravelDocumentor\Contract;

use ReindertVetter\LaravelDocumentor\Collection\ExampleCollection;


/**
 * Interface ParameterInterface
 *
 * @package ReindertVetter\LaravelDocumentor\Contract
 */
interface ParameterInterface
{
    public function getIn(): string;
    public function getName(): string;
    public function getSchema(): SchemaInterface;
    public function isRequired(): bool;
    public function getDescription(): string;

    public function getExamples(): ExampleCollection;

    public function toOpenApiArray(): array;
}