<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointStorage\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\ServicePointStorageTransfer;
use Generated\Shared\Transfer\ServiceTypeStorageTransfer;
use Orm\Zed\ServicePointStorage\Persistence\SpyServicePointStorage;
use Orm\Zed\ServicePointStorage\Persistence\SpyServiceTypeStorage;

class ServicePointStorageMapper
{
    public function mapServicePointStorageTransferToServicePointStorageEntity(
        ServicePointStorageTransfer $servicePointStorageTransfer,
        SpyServicePointStorage $servicePointStorageEntity
    ): SpyServicePointStorage {
        return $servicePointStorageEntity->setData($servicePointStorageTransfer->toArray());
    }

    public function mapServiceTypeStorageTransferToServiceTypeStorageEntity(
        ServiceTypeStorageTransfer $serviceTypeStorageTransfer,
        SpyServiceTypeStorage $serviceTypeStorageEntity
    ): SpyServiceTypeStorage {
        return $serviceTypeStorageEntity->setData($serviceTypeStorageTransfer->toArray());
    }
}
