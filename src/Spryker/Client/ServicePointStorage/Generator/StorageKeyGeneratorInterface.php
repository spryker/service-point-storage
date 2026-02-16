<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointStorage\Generator;

interface StorageKeyGeneratorInterface
{
    /**
     * @param array<int> $resourceIds
     * @param string $resourceName
     * @param string|null $storeName
     *
     * @return array<string>
     */
    public function generateIdKeys(
        array $resourceIds,
        string $resourceName,
        ?string $storeName = null
    ): array;

    /**
     * @param array<string> $uuids
     * @param string $resourceName
     * @param string|null $storeName
     *
     * @return array<string>
     */
    public function generateUuidKeys(
        array $uuids,
        string $resourceName,
        ?string $storeName = null
    ): array;
}
