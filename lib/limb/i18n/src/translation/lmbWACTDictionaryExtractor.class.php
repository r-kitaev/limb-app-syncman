<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com 
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html 
 */
lmb_require('limb/i18n/src/translation/lmbSourceDictionaryExtractor.class.php');

/**
 * class lmbWACTDictionaryExtractor.
 *
 * @package i18n
 * @version $Id: lmbWACTDictionaryExtractor.class.php 6241 2007-08-29 05:46:06Z pachanga $
 */
class lmbWACTDictionaryExtractor extends lmbSourceDictionaryExtractor
{
  function extract($code, &$dictionaries = array(), $response = null)
  {
    if(preg_match_all('~\{\$[\'"]([^\'"]+)[\'"]\|i18n(:[\'"]([^\'"]+)[\'"])?~', $code, $matches))
    {
      foreach($matches[1] as $index => $text)
      {
        $domain = $matches[3][$index] ? $matches[3][$index] : 'default';

        if($response)
          $response->write("WACT template: '$text'@$domain\n");

        if(!isset($dictionaries[$domain]))
        {
          $dictionary = new lmbI18NDictionary();
          $dictionaries[$domain] = $dictionary;
        }
        else
          $dictionary = $dictionaries[$domain];

        $dictionary->add($text);
      }
    }
  }
}


