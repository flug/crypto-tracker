<?php
declare(strict_types=1);

namespace Clooder\Command;

use Clooder\Client\Nomics;
use Clooder\Normalizer\CurrencyNormalizer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RunCommand extends Command
{
    protected static $defaultName = 'run:currencies:ticker';
    private $nomics;
    /**
     * @var CurrencyNormalizer
     */
    private CurrencyNormalizer $currencyNormalizer;
    
    public function __construct(Nomics $nomics , CurrencyNormalizer $currencyNormalizer)
    {
        $this->nomics = $nomics;
        
        parent::__construct(null);
        $this->currencyNormalizer = $currencyNormalizer;
    }
    
    protected function configure()
    {
    
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $io = new SymfonyStyle($input, $output);
        
        $headers = ['il y a'];
        foreach ($this->nomics->getPrices() as $price){
            $headers[] = $this->currencyNormalizer->normalize($price)->getName();
        }
        
        
        $io->table(
            $headers,
            [
                ['1d', 'Cell 1-2'],
                ['30d', 'Cell 2-2'],
            ]
        );
        
        return 0;
    }
}
