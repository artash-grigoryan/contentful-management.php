<?php

/**
 * This file is part of the contentful/contentful-management package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Management\Mapper;

use Contentful\Management\Resource\Extension as ResourceClass;
use Contentful\Management\Resource\Extension\FieldType;
use Contentful\Management\SystemProperties;

/**
 * Extension class.
 *
 * This class is responsible for converting raw API data into a PHP object
 * of class Contentful\Management\Resource\Extension.
 */
class Extension extends BaseMapper
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data): ResourceClass
    {
        return $this->hydrator->hydrate($resource ?: ResourceClass::class, [
            'sys' => new SystemProperties($data['sys']),
            'name' => $data['extension']['name'],
            'source' => $data['extension']['src'] ?? $data['extension']['srcdoc'] ?? '',
            'fieldTypes' => \array_map([$this, 'buildFieldTypes'], $data['extension']['fieldTypes']),
            'sidebar' => $data['extension']['sidebar'],
        ]);
    }

    /**
     * @param array $data
     *
     * @return FieldType
     */
    protected function buildFieldTypes(array $data): FieldType
    {
        $secondParam = [];

        if ('Link' === $data['type']) {
            $secondParam = [$data['linkType']];
        }

        if ('Array' === $data['type']) {
            $secondParam = [
                $data['items']['type'],
                $data['items']['linkType'] ?? \null,
            ];
        }

        return new FieldType(
            $data['type'],
            $secondParam
        );
    }
}
