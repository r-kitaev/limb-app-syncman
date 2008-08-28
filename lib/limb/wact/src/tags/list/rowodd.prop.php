<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com 
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html 
 */

/**
 * @property ListRowOdd
 * @tag_class WactListItemTag
 * @package wact
 * @version $Id: rowodd.prop.php 6243 2007-08-29 11:53:10Z pachanga $
 */
class WactListRowOddProperty extends WactCompilerProperty
{
  protected $temp_var;
  protected $has_increment = FALSE;

  function generateScopeEntry($code_writer)
  {
    $this->temp_var = $code_writer->getTempVariable();
    $code_writer->writePHP('$' . $this->temp_var . ' = 0;');
  }

  /**
   * @param WactCodeWriter
   */
  function generatePreStatement($code_writer)
  {
    if (!$this->has_increment)
    {
      $this->has_increment = TRUE;
      $code_writer->writePHP('$' . $this->temp_var . '++;');
    }
  }

  /**
   * @param WactCodeWriter
   */
  function generateExpression($code_writer)
  {
    $code_writer->writePHP('(Boolean) ( $' . $this->temp_var . ' % 2)');
  }
}
