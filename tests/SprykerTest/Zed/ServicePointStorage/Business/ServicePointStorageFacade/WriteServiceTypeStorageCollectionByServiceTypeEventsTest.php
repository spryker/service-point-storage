<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\ServicePointStorage\Business\ServicePointStorageFacade;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\EventEntityTransfer;
use Generated\Shared\Transfer\ServiceTypeTransfer;
use SprykerTest\Zed\ServicePointStorage\ServicePointStorageBusinessTester;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group ServicePointStorage
 * @group Business
 * @group ServicePointStorageFacade
 * @group WriteServiceTypeStorageCollectionByServiceTypeEventsTest
 * Add your own group annotations below this line
 */
class WriteServiceTypeStorageCollectionByServiceTypeEventsTest extends Unit
{
    /**
     * @var string
     */
    protected const NOT_EXISTING_ID_SERVICE_TYPE = -1;

    /**
     * @var \SprykerTest\Zed\ServicePointStorage\ServicePointStorageBusinessTester
     */
    protected ServicePointStorageBusinessTester $tester;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tester->ensureServiceTypeStorageDatabaseTableIsEmpty();
    }

    public function testShouldNotWriteWhenServiceTypeIdsAreNotProvided(): void
    {
        // Arrange
        $serviceTypeTransfer = $this->tester->haveServiceType();

        // Act
        $this->tester->getFacade()->writeServiceTypeStorageCollectionByServiceTypeEvents([new EventEntityTransfer()]);

        // Assert
        $serviceTypeStorageEntities = $this->tester->getServiceTypeStorageEntitiesByServiceTypeIds([$serviceTypeTransfer->getIdServiceTypeOrFail()]);
        $this->assertCount(0, $serviceTypeStorageEntities);
    }

    public function testShouldNotWriteWhenNotExistingServiceTypeIdIsProvided(): void
    {
        // Arrange
        $this->tester->haveServiceType();
        $eventEntityTransfer = (new EventEntityTransfer())->setId(static::NOT_EXISTING_ID_SERVICE_TYPE);

        // Act
        $this->tester->getFacade()->writeServiceTypeStorageCollectionByServiceTypeEvents([$eventEntityTransfer]);

        // Assert
        $serviceTypeStorageEntities = $this->tester->getServiceTypeStorageEntitiesByServiceTypeIds([static::NOT_EXISTING_ID_SERVICE_TYPE]);
        $this->assertCount(0, $serviceTypeStorageEntities);
    }

    public function testShouldUpdateServiceTypeStorageEntities(): void
    {
        // Arrange
        $serviceTypeTransfer = $this->tester->haveServiceType();
        $this->tester->saveServiceTypeStorage((clone $serviceTypeTransfer)->setUuid('testUuid'));

        // Act
        $this->tester->getFacade()->writeServiceTypeStorageCollectionByServiceTypeEvents(
            [(new EventEntityTransfer())->setId($serviceTypeTransfer->getIdServiceTypeOrFail())],
        );

        // Assert
        $serviceTypeStorageEntities = $this->tester->getServiceTypeStorageEntitiesByServiceTypeIds([$serviceTypeTransfer->getIdServiceTypeOrFail()]);
        $this->assertCount(1, $serviceTypeStorageEntities);
        $this->assertEquals($serviceTypeTransfer->toArray(), $serviceTypeStorageEntities[0]->getData());
    }

    public function testShouldCreateServiceTypeStorageEntities(): void
    {
        // Arrange
        $serviceTypeTransfer = $this->tester->haveServiceType();

        // Act
        $this->tester->getFacade()->writeServiceTypeStorageCollectionByServiceTypeEvents(
            [(new EventEntityTransfer())->setId($serviceTypeTransfer->getIdServiceTypeOrFail())],
        );

        // Assert
        $serviceTypeStorageEntities = $this->tester->getServiceTypeStorageEntitiesByServiceTypeIds([$serviceTypeTransfer->getIdServiceTypeOrFail()]);
        $this->assertCount(1, $serviceTypeStorageEntities);
        $this->assertSame($serviceTypeTransfer->getIdServiceTypeOrFail(), $serviceTypeStorageEntities[0]->getFkServiceType());
    }

    public function testShouldRemoveServiceTypeStorageEntitiesWhenServiceTypesWithIdsDoNotExist(): void
    {
        // Arrange
        $this->tester->ensureServiceTypeTableIsEmpty();
        $serviceTypeTransfer = $this->tester->haveServiceType();
        $this->tester->saveServiceTypeStorage($serviceTypeTransfer);
        $notExistingServiceTypeTransfer = (new ServiceTypeTransfer())->setIdServiceType(
            $serviceTypeTransfer->getIdServiceTypeOrFail() + 1,
        );
        $this->tester->saveServiceTypeStorage($notExistingServiceTypeTransfer);
        $eventEntityTransfers = [
            (new EventEntityTransfer())->setId($notExistingServiceTypeTransfer->getIdServiceTypeOrFail()),
            (new EventEntityTransfer())->setId($serviceTypeTransfer->getIdServiceTypeOrFail()),
        ];

        // Act
        $this->tester->getFacade()->writeServiceTypeStorageCollectionByServiceTypeEvents($eventEntityTransfers);

        // Assert
        $serviceTypeStorageEntities = $this->tester->getServiceTypeStorageEntitiesByServiceTypeIds(
            [$serviceTypeTransfer->getIdServiceTypeOrFail(), $notExistingServiceTypeTransfer->getIdServiceTypeOrFail()],
        );
        $this->assertCount(1, $serviceTypeStorageEntities);
        $this->assertSame($serviceTypeTransfer->getIdServiceTypeOrFail(), $serviceTypeStorageEntities[0]->getFkServiceType());
    }
}
