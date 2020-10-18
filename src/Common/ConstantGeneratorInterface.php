<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use ReflectionClassConstant;
use GrizzIt\Ast\Common\Php\PropertyInterface;

interface ConstantGeneratorInterface
{
    /**
     * Generate an AST constant based on a reflection property.
     *
     * @param ReflectionClassConstant $constant
     *
     * @return PropertyInterface
     */
    public function generate(
        ReflectionClassConstant $constant
    ): PropertyInterface;
}
