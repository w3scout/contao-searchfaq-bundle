<?php

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

namespace W3Scout\Searchfaq;

class ModuleSearchfaq extends \Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_searchfaq';

    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['searchfaq'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the module
     */
    protected function compile()
    {
        $this->Template->label  		= $GLOBALS['TL_LANG']['MSC']['searchfaq_label'];
        $this->Template->slabel  		= $GLOBALS['TL_LANG']['MSC']['searchfaq_slabel'];
        $this->Template->sreset  		= $GLOBALS['TL_LANG']['MSC']['searchfaq_sreset'];
        $this->Template->placeholder  	= $GLOBALS['TL_LANG']['MSC']['searchfaq_placeholder'];
    }
}

