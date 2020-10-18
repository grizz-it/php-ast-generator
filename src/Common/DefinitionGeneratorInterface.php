<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\DefinitionInterface;

interface DefinitionGeneratorInterface
{
    /**
     * Generate an AST class based on a reflection class.
     *
     * @param ReflectionClass $class
     *
     * @return DefinitionInterface
     */
    public function generate(
        ReflectionClass $class
    ): DefinitionInterface;
}
