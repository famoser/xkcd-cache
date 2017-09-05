<?php
/**
 * Created by PhpStorm.
 * User: famoser
 * Date: 09.12.2016
 * Time: 08:45
 */

namespace Famoser\XKCD\Cache\Tests\ControllerTests\Base;


use Famoser\XKCD\Cache\Tests\Utils\TestHelper\ApiTestHelper;
use Famoser\XKCD\Cache\Tests\Utils\TestHelper\TestHelper;

/**
 * a base class for all api tests
 *
 * @package Famoser\XKCD\Cache\Tests\ControllerTests\Base
 */
class ApiTestController extends BaseTestController
{
    /**
     * return the test helper you want to use
     *
     * @return TestHelper
     */
    protected function constructTestHelper()
    {
        return new ApiTestHelper();
    }

    /**
     * @return ApiTestHelper
     */
    protected function getTestHelper()
    {
        return parent::getTestHelper();
    }
}