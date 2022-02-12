<?php

namespace AAM\Payment\Model;

class GatewayResponse
{
    protected $result = [];
    protected $status = 200;
    protected $data = [];
    protected $validation_has_failed = false;
    protected $validation_failures = [];
    protected $error_messages = [];
    protected $is_success = true;
    protected $is_error = false;
    protected $action = '';

    public function __construct($result, $status)
    {
        $this->result = $result;
        $this->status = (int) $status;

        if (isset($result['data']) && is_array($result['data'])) {
            $this->data = $result['data'];
        }

        if (isset($result['validationHasFailed']) && is_bool($result['validationHasFailed'])) {
            $this->validation_has_failed = !empty($result['validationHasFailed']);
        }

        if (isset($result['validationFailures']) && is_array($result['validationFailures'])) {
            $this->validation_failures = $result['validationFailures'];
        }

        if (isset($result['isSuccess']) && is_bool($result['isSuccess'])) {
            $this->is_success = !empty($result['isSuccess']);
        }

        if (isset($result['isError']) && is_bool($result['isError'])) {
            $this->is_error = !empty($result['isError']);
        }

        if (isset($result['action']) && is_string($result['action'])) {
            $this->action = $result['action'];
        }
    }

    public function dataContains(string $prop): bool
    {
        return array_key_exists($prop, $this->data);
    }

    public function getFromData(string $prop): string
    {
        return $this->dataContains($prop) ? (string) $this->data[$prop] : '';
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function validationHasFailed(): bool
    {
        return $this->validation_has_failed;
    }

    public function getValidationFailures(): array
    {
        return $this->validation_failures;
    }

    public function getErrorMessages(): array
    {
        return $this->error_messages;
    }

    public function isSuccess(): bool
    {
        return $this->is_success;
    }

    public function isError(): bool
    {
        return $this->is_error;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
