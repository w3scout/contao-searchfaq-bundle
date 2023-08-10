<?php

declare(strict_types=1);

/**
 * @copyright  Darko Selesi 2018 <http://w3scouts.com>
 * @author     Darko Selesi (w3scout)
 * @package    SearchFAQ
 * @license    LGPL-3.0+
 * @see	       https://github.com/w3scout/contao-searchfaq-bundle
 */

namespace W3Scout\ContaoSearchFaq\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create('W3Scout\ContaoSearchFaq\W3ScoutContaoSearchFaq')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle'])
                ->setReplace(['searchfaq']),
        ];
    }
}
