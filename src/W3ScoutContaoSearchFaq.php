<?php
/**
 * @copyright  Darko Selesi 2018 <http://w3scouts.com>
 * @author     Darko Selesi (w3scout)
 * @package    SearchFAQ
 * @license    LGPL-3.0+
 * @link https://github.com/w3scout/contao-google-business-reviews
 *
 */

namespace W3Scout\ContaoSearchFaq;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class W3ScoutContaoSearchFaq extends Bundle {
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
