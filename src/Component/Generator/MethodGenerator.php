<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator;

use ReflectionMethod;
use GrizzIt\Ast\Common\Php\MethodInterface;
use GrizzIt\PhpAstGenerator\Common\MethodGeneratorInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Method\Method;
use GrizzIt\PhpAstGenerator\Common\VariableGeneratorInterface;

class MethodGenerator implements MethodGeneratorInterface
{
    /**
     * Contains the variable generator.
     *
     * @var VariableGeneratorInterface
     */
    private VariableGeneratorInterface $variableGenerator;

    /**
     * Constructor
     *
     * @param VariableGeneratorInterface $variableGenerator
     */
    public function __construct(VariableGeneratorInterface $variableGenerator)
    {
        $this->variableGenerator = $variableGenerator;
    }

    /**
     * Generate an AST method based on a reflection method.
     *
     * @param ReflectionMethod $method
     *
     * @return MethodInterface
     */
    public function generate(
        ReflectionMethod $method
    ): MethodInterface {
        $returnType = $method->getReturnType();
        $astMethod = new Method(
            $method->getName(),
            $method->isPrivate() ?
                'private' :
                ($method->isProtected() ? 'protected' : 'public'),
            $returnType !== null ? $returnType->getName() : ''
        );

        $astMethod->setIsAbstract($method->isAbstract());
        $astMethod->setIsFinal($method->isFinal());

        $parameters = [];
        foreach ($method->getParameters() as $parameter) {
            $parameters[] = $this->variableGenerator->generate($parameter);
        }

        $astMethod->setParameters(...$parameters);

        return $astMethod;
    }
}
