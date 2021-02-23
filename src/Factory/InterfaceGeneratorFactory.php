<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Factory;

use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;
use GrizzIt\PhpAstGenerator\Component\Generator\MethodGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\ConstantGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\VariableGenerator;
use GrizzIt\PhpAstGenerator\Component\Generator\Definition\InterfaceGenerator;

class InterfaceGeneratorFactory
{
    /**
     * Creates a interface generator.
     *
     * @param bool $includeParent
     * @param bool $includeMethods
     * @param bool $includeConstants
     * @param bool $includeParentMethods
     * @param bool $includePrivateMethods
     *
     * @return DefinitionGeneratorInterface
     */
    public function create(
        bool $includeParent,
        bool $includeMethods,
        bool $includeConstants,
        bool $includeParentMethods = false,
        bool $includePrivateMethods = true
    ): DefinitionGeneratorInterface {
        $methodGenerator = $includeMethods ?
            new MethodGenerator(new VariableGenerator()) :
            null;

        $constantGenerator = $includeConstants ?
            new ConstantGenerator() :
            null;

        return new InterfaceGenerator(
            $includeParent,
            $methodGenerator,
            $constantGenerator,
            $includeParentMethods,
            $includePrivateMethods
        );
    }
}
