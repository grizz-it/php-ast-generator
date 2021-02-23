<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator;

use ReflectionProperty;
use GrizzIt\Ast\Common\Php\PropertyInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Value\Value;
use GrizzIt\PhpAstGenerator\Common\PropertyGeneratorInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Property\Property;

class PropertyGenerator implements PropertyGeneratorInterface
{
    /**
     * Generate an AST property based on a reflection property.
     *
     * @param ReflectionProperty $property
     * @param mixed $defaultValue
     *
     * @return PropertyInterface
     */
    public function generate(
        ReflectionProperty $property,
        mixed $defaultValue = null
    ): PropertyInterface {
        $type = method_exists($property, 'getType') ? $property->getType() : null;
        $astProperty = new Property(
            $property->getName(),
            (
                $property->isPrivate() ?
                'private' :
                ($property->isProtected() ? 'protected' : 'public')
            ),
            $type !== null ? $type->getName() : '',
            '',
            ($defaultValue !== null ? new Value($defaultValue) : null)
        );

        $astProperty->setIsStatic($property->isStatic());

        return $astProperty;
    }
}
