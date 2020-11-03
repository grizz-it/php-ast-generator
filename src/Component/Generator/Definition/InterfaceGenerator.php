<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator\Definition;

use ReflectionClass;
use GrizzIt\Ast\Common\Php\DefinitionInterface;
use GrizzIt\PhpAstGenerator\Common\MethodGeneratorInterface;
use GrizzIt\PhpAstGenerator\Common\ConstantGeneratorInterface;
use GrizzIt\PhpAstGenerator\Common\DefinitionGeneratorInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Definition\InterfaceDefinition;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractMethodsTrait;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractConstantsTrait;
use GrizzIt\PhpAstGenerator\Component\Generator\Extractor\ExtractInterfacesTrait;

class InterfaceGenerator implements DefinitionGeneratorInterface
{
    use ExtractInterfacesTrait;
    use ExtractMethodsTrait;
    use ExtractConstantsTrait;

    /**
     * Whether the interface should inherit the same interfaces.
     *
     * @var bool
     */
    private $includeParent;

    /**
     * Whether the parents methods should be inherited.
     *
     * @var bool
     */
    private $includeParentMethods;

    /**
     * Whether the private methods should be inherited.
     *
     * @var bool
     */
    private $includePrivateMethods;

    /**
     * Constructor.
     *
     * @param bool $includeParent
     * @param MethodGeneratorInterface|null $methodGenerator
     * @param ConstantGeneratorInterface|null $constantGenerator
     * @param bool $includeParentMethods
     * @param bool $includePrivateMethods
     */
    public function __construct(
        bool $includeParent,
        ?MethodGeneratorInterface $methodGenerator,
        ?ConstantGeneratorInterface $constantGenerator,
        bool $includeParentMethods = false,
        bool $includePrivateMethods = true
    ) {
        $this->includeParent = $includeParent;
        $this->methodGenerator = $methodGenerator;
        $this->constantGenerator = $constantGenerator;
        $this->includeParentMethods = $includeParentMethods;
        $this->includePrivateMethods = $includePrivateMethods;
    }

    /**
     * Generate an AST class based on a reflection class.
     *
     * @param ReflectionClass $class
     *
     * @return DefinitionInterface
     */
    public function generate(
        ReflectionClass $reflection
    ): DefinitionInterface {
        $interface = new InterfaceDefinition(
            $reflection->getShortName(),
            $reflection->getNamespaceName(),
            ...(
                $this->includeParent ?
                $this->extractInterfaces($reflection) :
                []
            )
        );

        $methods = $this->extractMethods(
            $reflection,
            $this->includeParentMethods,
            $this->includePrivateMethods
        );

        foreach ($methods as $key => $method) {
            if (in_array($method->getName(), ['__construct', '__destruct'])) {
                unset($methods[$key]);
            }
        }

        $interface->setMethods(...$methods);
        $interface->setConstants(...$this->extractConstants($reflection));

        return $interface;
    }
}
