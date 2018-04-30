# Contao Searchfaq Bundle

[![Latest Stable Version](https://poser.pugx.org/w3scout/contao-searchfaq-bundle/v/stable)](https://packagist.org/packages/w3scout/contao-searchfaq-bundle)
[![Total Downloads](https://poser.pugx.org/w3scout/contao-searchfaq-bundle/downloads)](https://packagist.org/packages/w3scout/contao-searchfaq-bundle)
[![Latest Unstable Version](https://poser.pugx.org/w3scout/contao-searchfaq-bundle/v/unstable)](https://packagist.org/packages/w3scout/contao-searchfaq-bundle)
[![License](https://poser.pugx.org/w3scout/contao-searchfaq-bundle/license)](https://packagist.org/packages/w3scout/contao-searchfaq-bundle)
[![Dependency Status](https://www.versioneye.com/user/projects/5ae68b0c0fb24f54332bfabd/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/5ae68b0c0fb24f54332bfabd)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b89debe9-131d-4c0a-b21e-b8ae0c53708d/mini.png)](https://insight.sensiolabs.com/projects/b89debe9-131d-4c0a-b21e-b8ae0c53708d)

## About
Search FAQ-sites.

This bundle adds a search-module for FAQ-sites and turns the FAQ-items into an accordion which can have multiple items open simultaneously, if they contain matches. 

## Installation
Install [composer](https://getcomposer.org) if you haven't already, then enter this command in the main directory of your Contao installation:
```sh
composer require w3scout/contao-searchfaq-bundle
```
## Usage
1. Create at least one FAQ category (without choosing a reader redirectpage)
2. Add your FAQ items
3. Create a "FAQ-Site" module and select "mod_faqpage_accordion" as individual template
4. Create a "FAQ-Search" module and publish it above your FAQ-Site module
5. Add the jQuery library to your theme and activate the following templates: 
   * j_accordion_open_multiple
   * j_searchfaq

## Contribution
Bug reports and pull requests are welcome
