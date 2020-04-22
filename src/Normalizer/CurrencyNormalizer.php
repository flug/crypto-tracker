<?php
declare(strict_types=1);

namespace Clooder\Normalizer;

use Clooder\Model\Currency;

class CurrencyNormalizer implements NormalizerInterface
{
    public function normalize(array $data): Currency
    {
        return Currency::fromArray($data);
    }
    
    public function supports(array $data): bool
    {
        // TODO: Implement supports() method.
    }
}
