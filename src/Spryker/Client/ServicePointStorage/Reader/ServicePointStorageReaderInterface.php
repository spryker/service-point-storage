<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointStorage\Reader;

use Generated\Shared\Transfer\ServicePointStorageCollectionTransfer;
use Generated\Shared\Transfer\ServicePointStorageCriteriaTransfer;

interface ServicePointStorageReaderInterface
{
    public function getServicePointStorageCollection(
        ServicePointStorageCriteriaTransfer $servicePointStorageCriteriaTransfer
    ): ServicePointStorageCollectionTransfer;
}
