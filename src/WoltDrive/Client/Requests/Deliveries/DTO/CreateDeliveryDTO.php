<?php
/**
 * Description of CreateDeliveryDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WoltDrive\Client\Requests\Deliveries\DTO;

use Dots\Data\DTO;
use Dots\WoltDrive\Client\Resources\CustomerSupport;
use Dots\WoltDrive\Client\Resources\Recipient;

class CreateDeliveryDTO extends DTO
{
    protected string $shipment_promise_id;

    protected ?array $pickup;

    protected array $dropoff;

    protected Recipient $recipient;

    protected array $parcels = [];

    protected CustomerSupport $customer_support;

    protected ?string $merchant_order_reference_id;

    protected ?array $sms_notifications;

    protected array $tips = [];

    protected ?string $order_number;

    protected ?array $cash;

    protected ?array $handshake_delivery;

    protected ?string $scheduled_dropoff_time;

    public function getShipmentPromiseId(): string
    {
        return $this->shipment_promise_id;
    }

    public function getPickup(): ?array
    {
        return $this->pickup;
    }

    public function getDropoff(): array
    {
        return $this->dropoff;
    }

    public function getRecipient(): Recipient
    {
        return $this->recipient;
    }

    public function getParcels(): array
    {
        return $this->parcels;
    }

    public function getCustomerSupport(): CustomerSupport
    {
        return $this->customer_support;
    }

    public function getMerchantOrderReferenceId(): ?string
    {
        return $this->merchant_order_reference_id;
    }

    public function getSmsNotifications(): ?array
    {
        return $this->sms_notifications;
    }

    public function getTips(): array
    {
        return $this->tips;
    }

    public function getOrderNumber(): ?string
    {
        return $this->order_number;
    }

    public function getCash(): ?array
    {
        return $this->cash;
    }

    public function getHandshakeDelivery(): ?array
    {
        return $this->handshake_delivery;
    }

    public function getScheduledDropoffTime(): ?string
    {
        return $this->scheduled_dropoff_time;
    }
}
