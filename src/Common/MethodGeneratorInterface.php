<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use ReflectionMethod;
use GrizzIt\Ast\Common\Php\MethodInterface;

interface MethodGeneratorInterface
{
    /**
     * Generate an AST method based on a reflection method.
     *
     * @param ReflectionMethod $method
     *
     * @return MethodInterface
     */
    public function generate(
        ReflectionMethod $method
    ): MethodInterface;
}
