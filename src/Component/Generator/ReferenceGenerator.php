<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Component\Generator;

use GrizzIt\Ast\Common\Php\ReferenceInterface;
use GrizzIt\PhpAstGenerator\Common\ReferenceGeneratorInterface;
use GrizzIt\Ast\Component\FileComponent\Php\Reference\UseReference;

class ReferenceGenerator implements ReferenceGeneratorInterface
{
    /**
     * Generate an AST reference based on a class.
     *
     * @param string $reference
     *
     * @return ReferenceInterface
     */
    public function generate(
        string $reference
    ): ReferenceInterface {
        return new UseReference($reference);
    }
}
