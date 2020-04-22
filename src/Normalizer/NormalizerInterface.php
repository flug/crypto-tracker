<?php
declare(strict_types=1);

namespace Clooder\Normalizer;

interface NormalizerInterface
{
    public function normalize(array $data);
    
    public function supports(array $data): bool;
}
