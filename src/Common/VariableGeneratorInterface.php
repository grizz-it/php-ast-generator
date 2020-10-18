<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use ReflectionParameter;
use GrizzIt\Ast\Common\Php\VariableInterface;

interface VariableGeneratorInterface
{
    /**
     * Generate an AST variable based on a reflection parameter.
     *
     * @param ReflectionParameter $parameter
     *
     * @return VariableInterface
     */
    public function generate(
        ReflectionParameter $parameter
    ): VariableInterface;
}
