<?php

/**
 * This file is part of the contentful/contentful-management package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Management\Resource;

use Contentful\Management\Resource\Behavior\CreatableInterface;
use Contentful\Management\Resource\Behavior\DeletableTrait;
use Contentful\Management\Resource\Behavior\UpdatableTrait;
use Contentful\Management\Resource\Extension\FieldType;

/**
 * Extension class.
 *
 * This class represents a resource with type "Extension" in Contentful.
 *
 * @see https://www.contentful.com/developers/docs/references/content-management-api/#/reference/ui-extensions
 * @see https://www.contentful.com/r/knowledgebase/ui-extensions-guide/
 *
 * @method void update()
 * @method void delete()
 */
class Extension extends BaseResource implements CreatableInterface
{
    use DeletableTrait,
        UpdatableTrait;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $source = '';

    /**
     * @var FieldType[]
     */
    protected $fieldTypes = [];

    /**
     * @var bool
     */
    protected $sidebar;

    /**
     * Extension construct.
     *
     * @param string $name
     */
    public function __construct(string $name = '')
    {
        $this->initialize('Extension');
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function asUriParameters(): array
    {
        return [
            'space' => $this->sys->getSpace()->getId(),
            'environment' => $this->sys->getEnvironment()->getId(),
            'extension' => $this->sys->getId(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getHeadersForCreation(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source Either the full extension code, or an URL
     *
     * @return static
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return FieldType[]
     */
    public function getFieldTypes(): array
    {
        return $this->fieldTypes;
    }

    /**
     * @param FieldType[] $fieldTypes
     *
     * @return static
     */
    public function setFieldTypes(array $fieldTypes)
    {
        $this->fieldTypes = [];

        \array_map([$this, 'addFieldType'], $fieldTypes);

        return $this;
    }

    /**
     * @param FieldType $fieldType
     *
     * @return static
     */
    public function addFieldType(FieldType $fieldType)
    {
        $this->fieldTypes[] = $fieldType;

        return $this;
    }

    /**
     * Shortcut for adding a new field type.
     *
     * @param string $type
     * @param array  $options
     *
     * @return static
     */
    public function addNewFieldType(string $type, array $options = [])
    {
        return $this->addFieldType(new FieldType($type, $options));
    }

    /**
     * @return bool
     */
    public function isSidebar(): bool
    {
        return $this->sidebar;
    }

    /**
     * @param bool $sidebar
     *
     * @return static
     */
    public function setSidebar(bool $sidebar)
    {
        $this->sidebar = $sidebar;

        return $this;
    }

    /**
     * Returns an array to be used by "json_encode" to serialize objects of this class.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        $sourceType = \filter_var($this->source, \FILTER_VALIDATE_URL)
            ? 'src'
            : 'srcdoc';

        return [
            'sys' => $this->sys,
            'extension' => [
                'name' => $this->name,
                'fieldTypes' => $this->fieldTypes,
                $sourceType => $this->source,
                'sidebar' => $this->sidebar,
            ],
        ];
    }
}
