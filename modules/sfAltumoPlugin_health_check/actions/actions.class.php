<?php

/**
* simple health-check actions.
*
* @package    reseller_platform
* @subpackage documentation
* @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class sfAltumoPlugin_health_checkActions extends \sfAltumoPlugin\Action\BaseActions {  
    
    /**
    * Executes index action
    * 
    * At this time this will always return healthy under the assumption that 
    * the entire framework has loaded completely.
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request){

        return $this->sendJsonResponse(
            true,
            'App is healthy',
            array(),
            true
        );

    }
 
}