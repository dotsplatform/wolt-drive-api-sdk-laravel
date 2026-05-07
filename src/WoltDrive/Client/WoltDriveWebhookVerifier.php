<?php
/**
 * Description of WoltDriveWebhookVerifier.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WoltDrive\Client;

use Dots\WoltDrive\Client\Exceptions\WoltDriveWebhookVerificationException;
use Dots\WoltDrive\Client\Resources\Consts\WebhookEventType;
use Dots\WoltDrive\Client\Resources\Webhook\LocationWebhookPayloadDTO;
use Dots\WoltDrive\Client\Resources\Webhook\OrderWebhookPayloadDTO;

class WoltDriveWebhookVerifier
{
    public function __construct(
        private readonly string $clientSecret,
    ) {
    }

    /**
     * @throws WoltDriveWebhookVerificationException
     */
    public function verify(array $payload): void
    {
        $this->verifyAndDecode($payload);
    }

    /**
     * @throws WoltDriveWebhookVerificationException
     */
    public function verifyAndDecodeOrderWebhook(array $payload): OrderWebhookPayloadDTO
    {
        $decodedPayload = $this->verifyAndDecode($payload);

        return OrderWebhookPayloadDTO::fromArray($decodedPayload);
    }

    /**
     * @throws WoltDriveWebhookVerificationException
     */
    public function verifyAndDecodeLocationWebhook(array $payload): LocationWebhookPayloadDTO
    {
        $decodedPayload = $this->verifyAndDecode($payload);

        return LocationWebhookPayloadDTO::fromArray($decodedPayload);
    }

    /**
     * @throws WoltDriveWebhookVerificationException
     */
    private function verifyAndDecode(array $payload): array
    {
        $token = $payload['token'] ?? null;

        if (! $token) {
            throw new WoltDriveWebhookVerificationException('Missing token in webhook payload');
        }

        return $this->decodeJwt($token);
    }

    /**
     * @throws WoltDriveWebhookVerificationException
     */
    private function decodeJwt(string $token): array
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            throw new WoltDriveWebhookVerificationException('Invalid JWT format');
        }

        [$headerBase64, $payloadBase64, $signatureBase64] = $parts;

        $this->verifySignature($headerBase64, $payloadBase64, $signatureBase64);

        $payloadJson = $this->base64UrlDecode($payloadBase64);
        $payload = json_decode($payloadJson, true);

        if (! is_array($payload)) {
            throw new WoltDriveWebhookVerificationException('Failed to decode JWT payload');
        }

        return $payload;
    }

    /**
     * @throws WoltDriveWebhookVerificationException
     */
    private function verifySignature(
        string $headerBase64,
        string $payloadBase64,
        string $signatureBase64,
    ): void {
        $dataToSign = $headerBase64 . '.' . $payloadBase64;

        $expectedSignature = hash_hmac('sha256', $dataToSign, $this->clientSecret, true);

        $actualSignature = $this->base64UrlDecode($signatureBase64);

        if (! hash_equals($expectedSignature, $actualSignature)) {
            throw new WoltDriveWebhookVerificationException('Invalid JWT signature');
        }
    }

    private function base64UrlDecode(string $data): string
    {
        $remainder = strlen($data) % 4;

        if ($remainder) {
            $data .= str_repeat('=', 4 - $remainder);
        }

        return base64_decode(strtr($data, '-_', '+/'));
    }
}
