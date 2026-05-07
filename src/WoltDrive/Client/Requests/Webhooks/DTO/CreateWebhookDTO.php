<?php
/**
 * Description of CreateWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WoltDrive\Client\Requests\Webhooks\DTO;

use Dots\Data\DTO;

class CreateWebhookDTO extends DTO
{
    protected string $callback_url;

    protected string $client_secret;

    protected ?array $callback_config;

    protected bool $disabled = false;

    protected array $subscribed_events = [];

    public function getCallbackUrl(): string
    {
        return $this->callback_url;
    }

    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    public function getCallbackConfig(): ?array
    {
        return $this->callback_config;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function getSubscribedEvents(): array
    {
        return $this->subscribed_events;
    }
}
