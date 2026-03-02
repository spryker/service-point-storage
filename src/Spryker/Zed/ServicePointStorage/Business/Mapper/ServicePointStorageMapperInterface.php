<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointStorage\Business\Mapper;

use Generated\Shared\Transfer\ServicePointStorageTransfer;
use Generated\Shared\Transfer\ServicePointTransfer;
use Generated\Shared\Transfer\ServiceTypeStorageTransfer;
use Generated\Shared\Transfer\ServiceTypeTransfer;

interface ServicePointStorageMapperInterface
{
    public function mapServicePointTransferToServicePointStorageTransfer(
        ServicePointTransfer $servicePointTransfer,
        ServicePointStorageTransfer $servicePointStorageTransfer
    ): ServicePointStorageTransfer;

    public function mapServiceTypeTransferToServiceTypeStorageTransfer(
        ServiceTypeTransfer $serviceTypeTransfer,
        ServiceTypeStorageTransfer $serviceTypeStorageTransfer
    ): ServiceTypeStorageTransfer;
}
