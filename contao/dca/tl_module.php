<?php

declare(strict_types=1);

/**
 * Contao Open Source CMS, Copyright (C) 2005-2018 Leo Feyer
 *
 * @copyright  Darko Selesi 2018 <http://w3scouts.com>
 * @author     Darko Selesi (w3scout)
 * @package    SearchFAQ
 * @license    LGPL-3.0+
 * @filesource
 * @see	       https://github.com/w3scout/contao-searchfaq-bundle
 */


use W3Scout\ContaoSearchFaq\Controller\FrontendModule\SearchfaqController;

/**
 * Frontend module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes'][SearchfaqController::TYPE]  = '{title_legend},name,headline,type;{config_legend};{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
