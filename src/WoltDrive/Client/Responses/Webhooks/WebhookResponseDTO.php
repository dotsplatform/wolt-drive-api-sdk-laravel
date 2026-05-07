<?php
/**
 * Description of WebhookResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WoltDrive\Client\Responses\Webhooks;

use Dots\WoltDrive\Client\Responses\WoltDriveResponseDTO;

class WebhookResponseDTO extends WoltDriveResponseDTO
{
    protected ?string $id;

    protected ?string $callback_url;

    protected ?array $callback_config;

    protected ?bool $disabled;

    protected array $subscribed_events = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCallbackUrl(): ?string
    {
        return $this->callback_url;
    }

    public function getCallbackConfig(): ?array
    {
        return $this->callback_config;
    }

    public function isDisabled(): ?bool
    {
        return $this->disabled;
    }

    public function getSubscribedEvents(): array
    {
        return $this->subscribed_events;
    }
}
