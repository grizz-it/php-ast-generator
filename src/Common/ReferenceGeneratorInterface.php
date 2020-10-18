<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\PhpAstGenerator\Common;

use GrizzIt\Ast\Common\Php\ReferenceInterface;

interface ReferenceGeneratorInterface
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
    ): ReferenceInterface;
}
