<?php
/**
 * Created by PhpStorm.
 * User: famoser
 * Date: 12.12.2016
 * Time: 13:33
 */

namespace Famoser\XKCD\Cache\Tests\FrameworkTests;


use Famoser\XKCD\Cache\Framework\ContainerBase;
use Famoser\XKCD\Cache\Services\Interfaces\CacheServiceInterface;
use Famoser\XKCD\Cache\Services\Interfaces\DatabaseServiceInterface;
use Famoser\XKCD\Cache\Services\Interfaces\LoggingServiceInterface;
use Famoser\XKCD\Cache\Services\Interfaces\SettingServiceInterface;
use Famoser\XKCD\Cache\Services\Interfaces\XKCDServiceInterface;
use Famoser\XKCD\Cache\Tests\Utils\TestHelper\ApiTestHelper;
use Slim\Interfaces\RouterInterface;
use Slim\Views\Twig;

/**
 * test the container base
 * @package Famoser\XKCD\Cache\Tests\FrameworkTests
 */
class ContainerBaseTest extends \PHPUnit_Framework_TestCase
{
    public function testPropertiesCorrect()
    {
        $testHelper = new ApiTestHelper();
        $app = $testHelper->getTestApp();
        $container = new ContainerBase($app->getContainer());

        static::assertInstanceOf(RouterInterface::class, $container->getRouter());
        static::assertInstanceOf(DatabaseServiceInterface::class, $container->getDatabaseService());
        static::assertInstanceOf(LoggingServiceInterface::class, $container->getLoggingService());
        static::assertInstanceOf(CacheServiceInterface::class, $container->getCacheService());
        static::assertInstanceOf(SettingServiceInterface::class, $container->getSettingService());
        static::assertInstanceOf(XKCDServiceInterface::class, $container->getXKCDService());
        static::assertInstanceOf(Twig::class, $container->getView());

        //6 methods tested + __construct
        $expectedMethodCount = 8;
        $actualMethodCount = count(get_class_methods(ContainerBase::class));
        static::assertTrue(
            $actualMethodCount == $expectedMethodCount,
            "expected " . $expectedMethodCount . " methods, got " . $actualMethodCount
        );
    }
}