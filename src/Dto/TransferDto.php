<?php

namespace App\Dto;

class TransferDto
{
    public function __construct(
        public string $payerId,
        public string $payeeId,
        public float $amount
    ) {}
}
