<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Extractor;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\MethodInterface;
use GrizzIt\PhpAstGenerator\Common\MethodGeneratorInterface;

trait ExtractMethodsTrait
{
    /**
     * Contains the method generator.
     *
     * @var MethodGeneratorInterface|null
     */
    private $methodGenerator;

    /**
     * Retrieves the methods.
     *
     * @param ReflectionClass $reflection
     *
     * @return MethodInterface[]
     */
    private function extractMethods(ReflectionClass $reflection): array
    {
        $methods = [];
        if ($this->methodGenerator !== null) {
            foreach ($reflection->getMethods() as $method) {
                if (
                    $method->getDeclaringClass()
                        ->getName() === $reflection->getName()
                ) {
                    $methods[] = $this->methodGenerator->generate($method);
                }
            }
        }

        return $methods;
    }
}
