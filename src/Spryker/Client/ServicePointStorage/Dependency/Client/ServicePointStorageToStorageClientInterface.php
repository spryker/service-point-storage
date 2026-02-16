<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\ServicePointStorage\Dependency\Client;

interface ServicePointStorageToStorageClientInterface
{
    /**
     * @param array<string> $keys
     *
     * @return array<string>
     */
    public function getMulti(array $keys): array;
}
