<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com 
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html 
 */

/**
 * @tag pager:next:DISABLED
 * @parent_tag_class WactPagerNavigatorTag
 * @package wact
 * @version $Id: next_disabled.tag.php 6243 2007-08-29 11:53:10Z pachanga $
 */
class WactPagerNextDisabledTag extends WactCompilerTag
{
  function generateTagContent($code)
  {
    $code->writePhp('if (!' . $this->findParentByClass('WactPagerNavigatorTag')->getComponentRefCode() . '->hasNext()) {');

    parent :: generateTagContent($code);

    $code->writePhp('}');
  }
}


