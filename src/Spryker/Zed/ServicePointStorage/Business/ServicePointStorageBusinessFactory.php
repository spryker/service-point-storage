<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ServicePointStorage\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ServicePointStorage\Business\Mapper\ServicePointStorageMapper;
use Spryker\Zed\ServicePointStorage\Business\Mapper\ServicePointStorageMapperInterface;
use Spryker\Zed\ServicePointStorage\Business\Writer\ServicePointStorageWriter;
use Spryker\Zed\ServicePointStorage\Business\Writer\ServicePointStorageWriterInterface;
use Spryker\Zed\ServicePointStorage\Business\Writer\ServiceTypeStorageWriter;
use Spryker\Zed\ServicePointStorage\Business\Writer\ServiceTypeStorageWriterInterface;
use Spryker\Zed\ServicePointStorage\Dependency\Facade\ServicePointStorageToEventBehaviorFacadeInterface;
use Spryker\Zed\ServicePointStorage\Dependency\Facade\ServicePointStorageToServicePointFacadeInterface;
use Spryker\Zed\ServicePointStorage\Dependency\Facade\ServicePointStorageToStoreFacadeInterface;
use Spryker\Zed\ServicePointStorage\ServicePointStorageDependencyProvider;

/**
 * @method \Spryker\Zed\ServicePointStorage\ServicePointStorageConfig getConfig()
 * @method \Spryker\Zed\ServicePointStorage\Persistence\ServicePointStorageEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\ServicePointStorage\Persistence\ServicePointStorageRepositoryInterface getRepository()
 */
class ServicePointStorageBusinessFactory extends AbstractBusinessFactory
{
    public function createServicePointStorageWriter(): ServicePointStorageWriterInterface
    {
        return new ServicePointStorageWriter(
            $this->getEventBehaviorFacade(),
            $this->getServicePointFacade(),
            $this->getStoreFacade(),
            $this->getEntityManager(),
            $this->createServicePointStorageMapper(),
        );
    }

    public function createServiceTypeStorageWriter(): ServiceTypeStorageWriterInterface
    {
        return new ServiceTypeStorageWriter(
            $this->getEventBehaviorFacade(),
            $this->getServicePointFacade(),
            $this->getEntityManager(),
            $this->createServicePointStorageMapper(),
        );
    }

    public function createServicePointStorageMapper(): ServicePointStorageMapperInterface
    {
        return new ServicePointStorageMapper();
    }

    public function getEventBehaviorFacade(): ServicePointStorageToEventBehaviorFacadeInterface
    {
        return $this->getProvidedDependency(ServicePointStorageDependencyProvider::FACADE_EVENT_BEHAVIOR);
    }

    public function getServicePointFacade(): ServicePointStorageToServicePointFacadeInterface
    {
        return $this->getProvidedDependency(ServicePointStorageDependencyProvider::FACADE_SERVICE_POINT);
    }

    public function getStoreFacade(): ServicePointStorageToStoreFacadeInterface
    {
        return $this->getProvidedDependency(ServicePointStorageDependencyProvider::FACADE_STORE);
    }
}
