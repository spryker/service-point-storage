<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointStorage\Persistence;

use Generated\Shared\Transfer\ServicePointStorageTransfer;
use Generated\Shared\Transfer\ServiceTypeStorageTransfer;

interface ServicePointStorageEntityManagerInterface
{
    public function saveServicePointStorageForStore(
        ServicePointStorageTransfer $servicePointStorageTransfer,
        string $storeName
    ): void;

    /**
     * @param array<int> $servicePointIds
     * @param string|null $storeName
     *
     * @return void
     */
    public function deleteServicePointStorageByServicePointIds(array $servicePointIds, ?string $storeName = null): void;

    public function saveServiceTypeStorage(ServiceTypeStorageTransfer $serviceTypeStorageTransfer): void;

    /**
     * @param array<int> $serviceTypeIds
     *
     * @return void
     */
    public function deleteServiceTypeStorageByServiceTypeIds(array $serviceTypeIds): void;
}
