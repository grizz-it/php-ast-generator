<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator;

use ReflectionParameter;
use GrizzIt\Ast\Common\Php\VariableInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Value\Value;
use GrizzIt\Ast\Component\FileComponent\Php\Variable\Variable;
use GrizzIt\PhpAstGenerator\Common\VariableGeneratorInterface;

class VariableGenerator implements VariableGeneratorInterface
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
    ): VariableInterface {
        $variable = new Variable(
            $parameter->getName(),
            (
                $parameter->allowsNull() && !$parameter->isOptional() ?
                '?' :
                ''
            ) . $parameter->getType()->getName(),
            '',
            (
                $parameter->isDefaultValueAvailable() ?
                new Value($parameter->getDefaultValue()) :
                null
            )
        );

        $variable->setIsVariadic($parameter->isVariadic());

        return $variable;
    }
}
