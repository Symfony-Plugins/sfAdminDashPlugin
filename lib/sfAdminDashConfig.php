<?php
/**
* This class handles configuration for the sfAdminDashPlugin
*/
class sfAdminDashConfig
{
  /**
  * After the context has been initiated, we can add the required assets
  * 
  * @param sfEvent $event
  */
  public static function listenToContextLoadFactoriesEvent(sfEvent $event)
  {
    /** @var sfContext */
    $context = $event->getSubject();

    $context->getResponse()->addStylesheet(sfAdminDash::getProperty('web_dir').'/css/default.css', 'first');
    $context->getResponse()->addJavascript(sfAdminDash::getProperty('web_dir').'/js/sf_admin_dash.js', 'last');
    
    if (sfAdminDash::getProperty('include_jquery'))
    {
      $context->getResponse()->addJavascript(sfAdminDash::getProperty('web_dir').'/js/'.sfAdminDash::getProperty('jquery_filename'), 'first');
    }    
  }
  
  
  /**
  * This is the right way to add stuff to the <head> tag after the page has been generated :)
  * The principle is the same as with the old sfCommonFilter and asset insertion in sf 1.0-1.2
  * 
  * @param sfEvent $event
  */
  public static function listenToResponseFilterContentEvent(sfEvent $event, $content = null)
  {
    $jquery_include_tag = '<script type="text/javascript" src="'.sfAdminDash::getProperty('web_dir').'/js/'.sfAdminDash::getProperty('jquery_filename').'"></script>';
    $jquery_no_conflict_tag = '<script type="text/javascript">jQuery.noConflict();</script>';
    
    if (false !== ($pos = strpos($content, $jquery_include_tag)))
    {
      $content = substr($content, 0, $pos + strlen($jquery_include_tag)).$jquery_no_conflict_tag.substr($content, $pos + strlen($jquery_include_tag));
    }
    
    return $content;
  }
}