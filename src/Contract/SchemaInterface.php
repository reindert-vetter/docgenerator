<?php declare(strict_types=1);
/**
 * User: Reindert Vetter
 * Date: 15/07/2018
 */

namespace ReindertVetter\LaravelDocumentor\Contract;


interface SchemaInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getFormat(): string;

    public function getMinimum(): int;

    public function getMaximum(): int;

    public function getDefault(): int;
}