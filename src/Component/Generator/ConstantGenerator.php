<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator;

use ReflectionClassConstant;
use GrizzIt\Ast\Common\Php\PropertyInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Value\Value;
use GrizzIt\PhpAstGenerator\Common\ConstantGeneratorInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Property\Constant;

class ConstantGenerator implements ConstantGeneratorInterface
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
    ): PropertyInterface {
        return new Constant(
            $constant->getName(),
            (
                $constant->isPrivate() ?
                'private' :
                ($constant->isProtected() ? 'protected' : 'public')
            ),
            '',
            '',
            new Value($constant->getValue())
        );
    }
}
