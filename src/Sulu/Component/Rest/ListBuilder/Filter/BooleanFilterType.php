<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Component\Rest\ListBuilder\Filter;

use Sulu\Component\Rest\ListBuilder\FieldDescriptorInterface;
use Sulu\Component\Rest\ListBuilder\ListBuilderInterface;

class BooleanFilterType implements FilterTypeInterface
{
    public function filter(
        ListBuilderInterface $listBuilder,
        FieldDescriptorInterface $fieldDescriptor,
        $options
    ): void {
        if (!\is_string($options) || ('true' !== $options && 'false' !== $options)) {
            throw new InvalidFilterTypeOptionsException(
                'The BooleanFilterType requires its options to be true or false'
            );
        }

        $listBuilder->where($fieldDescriptor, 'true' === $options);
    }

    public static function getDefaultIndexName(): string
    {
        return 'boolean';
    }
}
