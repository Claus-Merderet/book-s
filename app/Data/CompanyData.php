<?php

namespace App\Data;

use Spatie\LaravelData\Data;

#[TypeScript]
/** @typescript */
class CompanyData extends Data
{

    public function __construct(
        public int     $id,
        public string  $name,
        public ?string $address,
    )
    {
    }
}
