<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use ReflectionProperty;
use GrizzIt\Ast\Common\Php\PropertyInterface;

interface PropertyGeneratorInterface
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
        $defaultValue = null
    ): PropertyInterface;
}
