<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Extractor;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\PropertyInterface;
use GrizzIt\PhpAstGenerator\Common\PropertyGeneratorInterface;

trait ExtractPropertiesTrait
{
    /**
     * Contains the property generator.
     *
     * @var PropertyGeneratorInterface|null
     */
    private $propertyGenerator;

    /**
     * Retrieves the properties of the reflection object.
     *
     * @param ReflectionClass $reflection
     *
     * @return PropertyInterface[]
     */
    private function extractProperties(ReflectionClass $reflection): array
    {
        $properties = [];

        if ($this->propertyGenerator !== null) {
            $defaultProperties = $reflection->getDefaultProperties();
            foreach ($reflection->getProperties() as $property) {
                if (
                    $property->getDeclaringClass()
                        ->getName() === $reflection->getName()
                ) {
                    $properties[] = $this->propertyGenerator->generate(
                        $property,
                        $defaultProperties[$property->getName()] ?? null
                    );
                }
            }
        }

        return $properties;
    }
}
