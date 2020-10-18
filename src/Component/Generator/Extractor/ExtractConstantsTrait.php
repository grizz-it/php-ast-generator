<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Extractor;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\PropertyInterface;

trait ExtractConstantsTrait
{
    /**
     * Contains the constant generator.
     *
     * @var ConstantGeneratorInterface|null
     */
    private $constantGenerator;

    /**
     * Retrieves the direct interfaces.
     *
     * @param ReflectionClass $reflection
     *
     * @return PropertyInterface[]
     */
    private function extractConstants(ReflectionClass $reflection): array
    {
        $constants = [];
        if ($this->constantGenerator !== null) {
            foreach ($reflection->getReflectionConstants() as $constant) {
                if ($constant->getDeclaringClass()->getName() === $reflection->getName()) {
                    $constants[] = $this->constantGenerator->generate($constant);
                }
            }
        }

        return $constants;
    }
}
