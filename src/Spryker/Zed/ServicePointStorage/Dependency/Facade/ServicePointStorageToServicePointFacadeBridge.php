<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointStorage\Dependency\Facade;

use Generated\Shared\Transfer\ServicePointCollectionTransfer;
use Generated\Shared\Transfer\ServicePointCriteriaTransfer;
use Generated\Shared\Transfer\ServiceTypeCollectionTransfer;
use Generated\Shared\Transfer\ServiceTypeCriteriaTransfer;

class ServicePointStorageToServicePointFacadeBridge implements ServicePointStorageToServicePointFacadeInterface
{
    /**
     * @var \Spryker\Zed\ServicePoint\Business\ServicePointFacadeInterface
     */
    protected $servicePointFacade;

    /**
     * @param \Spryker\Zed\ServicePoint\Business\ServicePointFacadeInterface $servicePointFacade
     */
    public function __construct($servicePointFacade)
    {
        $this->servicePointFacade = $servicePointFacade;
    }

    public function getServicePointCollection(ServicePointCriteriaTransfer $servicePointCriteriaTransfer): ServicePointCollectionTransfer
    {
        return $this->servicePointFacade->getServicePointCollection($servicePointCriteriaTransfer);
    }

    public function getServiceTypeCollection(
        ServiceTypeCriteriaTransfer $serviceTypeCriteriaTransfer
    ): ServiceTypeCollectionTransfer {
        return $this->servicePointFacade->getServiceTypeCollection($serviceTypeCriteriaTransfer);
    }
}
