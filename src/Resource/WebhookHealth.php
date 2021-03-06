<?php

/**
 * This file is part of the contentful/contentful-management package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Management\Resource;

/**
 * WebhookHealth class.
 *
 * This class represents a resource with type "Webhook" in Contentful.
 *
 * @see https://www.contentful.com/developers/docs/references/content-management-api/#/reference/webhook-calls/webhook-health
 */
class WebhookHealth extends BaseResource
{
    /**
     * @var int
     */
    protected $total = 0;

    /**
     * @var int
     */
    protected $healthy = 0;

    /**
     * WebhookHealth constructor.
     */
    private function __construct()
    {
    }

    /**
     * Returns an array to be used by "json_encode" to serialize objects of this class.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'sys' => $this->sys,
            'calls' => [
                'total' => $this->total,
                'healthy' => $this->healthy,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function asRequestBody()
    {
        throw new \LogicException(\sprintf(
            'Trying to convert object of class "%s" to a request body format, but operation is not supported on this class.',
            static::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function asUriParameters(): array
    {
        return [
            'space' => $this->sys->getSpace()->getId(),
            'webhook' => $this->sys->getCreatedBy()->getId(),
        ];
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getHealthy(): int
    {
        return $this->healthy;
    }
}
