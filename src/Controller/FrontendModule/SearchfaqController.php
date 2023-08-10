<?php

declare(strict_types=1);

/*
 * This file is part of SearchFaq.
 *
 * (c) Darko Selesi 2023 <hallo@w3scouts.com>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/w3scout/contao-searchfaq-bundle
 *
 */

namespace W3Scout\ContaoSearchFaq\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\ModuleModel;
use Contao\PageModel;
use Contao\Template;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Result;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\Translation\TranslatorInterface;

#[AsFrontendModule(category: 'faq', template: 'mod_searchfaq')]
class SearchfaqController extends AbstractFrontendModuleController
{
    public const TYPE = 'searchfaq';
    protected ?PageModel $page;

    /**
     * This method extends the parent __invoke method,
     * its usage is usually not necessary.
     */
    public function __invoke(Request $request, ModuleModel $model, string $section, array $classes = null, PageModel $page = null): Response
    {
        // Get the page model
        $this->page = $page;

        $scopeMatcher = $this->container->get('contao.routing.scope_matcher');

        if ($this->page instanceof PageModel && $scopeMatcher->isFrontendRequest($request)) {
            $this->page->loadDetails();
        }

        return parent::__invoke($request, $model, $section, $classes);
    }

    /**
     * Lazyload services.
     */
    public static function getSubscribedServices(): array
    {
        $services = parent::getSubscribedServices();

        $services['contao.framework'] = ContaoFramework::class;
        $services['database_connection'] = Connection::class;
        $services['contao.routing.scope_matcher'] = ScopeMatcher::class;
        $services['translator'] = TranslatorInterface::class;

        return $services;
    }
    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/w3scoutcontaosearchfaq/search.min.js|static';

        $template->label  		= $GLOBALS['TL_LANG']['MSC']['searchfaq_label'];
        $template->slabel  		= $GLOBALS['TL_LANG']['MSC']['searchfaq_slabel'];
        $template->sreset  		= $GLOBALS['TL_LANG']['MSC']['searchfaq_sreset'];
        $template->placeholder  	= $GLOBALS['TL_LANG']['MSC']['searchfaq_placeholder'];

        return $template->getResponse();
    }
}
