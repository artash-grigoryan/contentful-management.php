<?php

/**
 * This file is part of the contentful/contentful-management package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Tests\Management\Integration\Resource;

use Contentful\Management\Resource\PreviewApiKey;
use Contentful\Management\ResourceBuilder;
use Contentful\Tests\Management\BaseTestCase;

class PreviewApiKeyTest extends BaseTestCase
{
    /**
     * @expectedException \Error
     */
    public function testInvalidCreation()
    {
        new PreviewApiKey();
    }

    /**
     * This test is meaningless.
     * It's only here because private, empty constructors are not correctly picked by code coverage.
     */
    public function testConstructor()
    {
        $class = new \ReflectionClass(PreviewApiKey::class);
        $object = $class->newInstanceWithoutConstructor();
        $constructor = $class->getConstructor();
        $constructor->setAccessible(\true);
        $constructor->invoke($object);

        $this->markTestAsPassed();
    }

    /**
     * @return PreviewApiKey
     */
    public function testJsonSerialize(): PreviewApiKey
    {
        $previewApiKey = (new ResourceBuilder())->build([
            'sys' => [
                'type' => 'PreviewApiKey',
            ],
            'name' => 'Preview Key',
            'description' => \null,
            'accessToken' => 'ee8b264bf66ca66e0c005411cff6009456b256d0011f617bfbe128d0f0c99f9f',
            'environments' => [
                [
                    'sys' => [
                        'type' => 'Link',
                        'id' => 'master',
                        'linkType' => 'Environment',
                    ],
                ],
            ],
        ]);

        $this->assertJsonFixtureEqualsJsonObject('Integration/Resource/preview_api_key.json', $previewApiKey);

        return $previewApiKey;
    }

    /**
     * @param PreviewApiKey $previewApiKey
     *
     * @depends testJsonSerialize
     * @expectedException \LogicException
     * @expectedExceptionMessage Trying to update resource object in mapper of type "Contentful\Management\Mapper\PreviewApiKey", but only creation from scratch is supported.
     */
    public function testInvalidUpdate(PreviewApiKey $previewApiKey)
    {
        (new ResourceBuilder())
            ->build(['sys' => [
                'type' => 'PreviewApiKey',
            ]], $previewApiKey)
        ;
    }

    /**
     * @param PreviewApiKey $previewApiKey
     *
     * @depends testJsonSerialize
     * @expectedException \LogicException
     * @expectedExceptionMessage Trying to convert object of class "Contentful\Management\Resource\PreviewApiKey" to a request body format, but operation is not supported on this class.
     */
    public function testInvalidConversionToRequestBody(PreviewApiKey $previewApiKey)
    {
        $previewApiKey->asRequestBody();
    }
}
