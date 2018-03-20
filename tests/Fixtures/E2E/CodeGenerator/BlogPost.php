<?php

namespace Contentful\Tests\Management\Fixtures\E2E\CodeGenerator;

use Contentful\Core\Api\DateTimeImmutable;
use Contentful\Core\Api\Link;
use Contentful\Management\Resource\Asset;
use Contentful\Management\Resource\Entry;

/**
 * BlogPost class.
 *
 * This class was autogenerated.
 */
class BlogPost extends Entry
{
    /**
     * BlogPost constructor.
     */
    public function __construct()
    {
        parent::__construct('blogPost');
    }

    /**
     * Returns the "title" field.
     *
     * @param string $locale
     *
     * @return string|null
     */
    public function getTitle(string $locale = 'en-US')
    {
        return $this->getField('title', $locale);
    }

    /**
     * Sets the "title" field.
     *
     * @param string      $locale
     * @param string|null $value
     *
     * @return static
     */
    public function setTitle(string $locale = 'en-US', string $value = null)
    {
        return $this->setField('title', $locale, $value);
    }

    /**
     * Returns the "body" field.
     *
     * @param string $locale
     *
     * @return string|null
     */
    public function getBody(string $locale = 'en-US')
    {
        return $this->getField('body', $locale);
    }

    /**
     * Sets the "body" field.
     *
     * @param string      $locale
     * @param string|null $value
     *
     * @return static
     */
    public function setBody(string $locale = 'en-US', string $value = null)
    {
        return $this->setField('body', $locale, $value);
    }

    /**
     * Returns the "publishedAt" field.
     *
     * @param string $locale
     *
     * @return DateTimeImmutable|null
     */
    public function getPublishedAt(string $locale = 'en-US')
    {
        return $this->getField('publishedAt', $locale);
    }

    /**
     * Sets the "publishedAt" field.
     *
     * @param string                 $locale
     * @param DateTimeImmutable|null $value
     *
     * @return static
     */
    public function setPublishedAt(string $locale = 'en-US', DateTimeImmutable $value = null)
    {
        return $this->setField('publishedAt', $locale, $value);
    }

    /**
     * Returns the "image" field.
     *
     * @param string $locale
     *
     * @return Link|null
     */
    public function getImage(string $locale = 'en-US')
    {
        return $this->getField('image', $locale);
    }

    /**
     * Sets the "image" field.
     *
     * @param string    $locale
     * @param Link|null $value
     *
     * @return static
     */
    public function setImage(string $locale = 'en-US', Link $value = null)
    {
        return $this->setField('image', $locale, $value);
    }

    /**
     * Returns the resolved "image" link.
     *
     * @param string $locale
     *
     * @return Asset
     */
    public function resolveImageLink(string $locale = 'en-US')
    {
        $parameters = [
            // Representation of the URI parameters
            'space' => $this->sys->getSpace()->getId(),
        ];

        return $this->client->resolveLink($this->getField('image', $locale), $parameters);
    }

    /**
     * Returns the "related" field.
     *
     * @param string $locale
     *
     * @return Link[]|null
     */
    public function getRelated(string $locale = 'en-US')
    {
        return $this->getField('related', $locale);
    }

    /**
     * Sets the "related" field.
     *
     * @param string      $locale
     * @param Link[]|null $value
     *
     * @return static
     */
    public function setRelated(string $locale = 'en-US', array $value = null)
    {
        return $this->setField('related', $locale, $value);
    }

    /**
     * Returns an array of resolved "related" links.
     *
     * @param string $locale
     *
     * @return BlogPost[]
     */
    public function resolveRelatedLinks(string $locale = 'en-US')
    {
        $parameters = [
            // Representation of the URI parameters
            'space' => $this->sys->getSpace()->getId(),
        ];

        return \array_map(function (Link $link) use ($parameters) {
            return $this->client->resolveLink($link, $parameters);
        }, (array) $this->getField('related', $locale));
    }

    /**
     * Returns the "tags" field.
     *
     * @param string $locale
     *
     * @return string[]|null
     */
    public function getTags(string $locale = 'en-US')
    {
        return $this->getField('tags', $locale);
    }

    /**
     * Sets the "tags" field.
     *
     * @param string        $locale
     * @param string[]|null $value
     *
     * @return static
     */
    public function setTags(string $locale = 'en-US', array $value = null)
    {
        return $this->setField('tags', $locale, $value);
    }

    /**
     * Returns the "author" field.
     *
     * @param string $locale
     *
     * @return Link|null
     */
    public function getAuthor(string $locale = 'en-US')
    {
        return $this->getField('author', $locale);
    }

    /**
     * Sets the "author" field.
     *
     * @param string    $locale
     * @param Link|null $value
     *
     * @return static
     */
    public function setAuthor(string $locale = 'en-US', Link $value = null)
    {
        return $this->setField('author', $locale, $value);
    }

    /**
     * Returns the resolved "author" link.
     *
     * @param string $locale
     *
     * @return Author
     */
    public function resolveAuthorLink(string $locale = 'en-US')
    {
        $parameters = [
            // Representation of the URI parameters
            'space' => $this->sys->getSpace()->getId(),
        ];

        return $this->client->resolveLink($this->getField('author', $locale), $parameters);
    }
}
