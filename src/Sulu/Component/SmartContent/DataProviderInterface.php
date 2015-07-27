<?php
/*
 * This file is part of Sulu.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Component\SmartContent;

use Sulu\Component\Content\Compat\PropertyParameter;
use Sulu\Component\SmartContent\Configuration\ProviderConfigurationInterface;

/**
 * Interface for DataProviders which will be usable in SmartContent component.
 */
interface DataProviderInterface
{
    /**
     * Returns configuration for smart-content.
     *
     * @param PropertyParameter[] $propertyParameter
     *
     * @return ProviderConfigurationInterface
     */
    public function getConfiguration(array $propertyParameter);

    /**
     * Returns default parameter.
     *
     * @return PropertyParameter[]
     */
    public function getDefaultPropertyParameter();

    /**
     * Resolves given filters and returns filtered items.
     *
     * @param array $filters Contains the filter configuration.
     * @param array $propertyParameter Contains the parameter of resolved property.
     * @param int|null $limit Indicates maximum size of result set.
     * @param int $page Indicates page of result set.
     * @param int|null $pageSize Indicates page-size of result set.
     *
     * @return ItemInterface[]
     */
    public function resolveFilters(array $filters, array $propertyParameter, $limit = null, $page = 1, $pageSize = null);

    /**
     * Returns TRUE if next page exists for last resolveFilters call.
     *
     * @return bool
     */
    public function getHasNextPage();
}
