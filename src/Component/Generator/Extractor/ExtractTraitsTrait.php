<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Extractor;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\ReferenceInterface;
use GrizzIt\PhpAstGenerator\Common\ReferenceGeneratorInterface;

trait ExtractTraitsTrait
{
    /**
     * Contains the reference generator.
     *
     * @var ReferenceGeneratorInterface|null
     */
    private ?ReferenceGeneratorInterface $referenceGenerator;

    /**
     * Retrieves the traits of the reflection object.
     *
     * @param ReflectionClass $reflection
     *
     * @return ReferenceInterface[]
     */
    private function extractTraits(ReflectionClass $reflection): array
    {
        $traits = [];
        if ($this->referenceGenerator !== null) {
            foreach ($reflection->getTraits() as $trait) {
                $traits[] = $this->referenceGenerator->generate(
                    '\\' . trim($trait->getName(), '\\')
                );
            }
        }

        return $traits;
    }
}
