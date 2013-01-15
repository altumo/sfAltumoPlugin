<?php
/*
 * This file is part of the sfAltumoPlugin library.
 *
 * (c) Steve Sperandeo <steve.sperandeo@altumo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Creates or updates a single CurrencyConversionRate for the currencies provided.
 * 
 * @see \sfAltumoPlugin\Schema\PropelSchemaCompiler
 * 
 * @author Juan Jaramillo <juan.jaramillo@altumo.com>
 */
class sfAltumoCreateOrUpdateCurrencyConversionRateTask extends sfAltumoBaseTask {

    /**
    * @see sfTask
    */
    protected function configure() {

        parent::configure();
        
        $this->addArguments(array(
            new sfCommandArgument( 'from_currency', sfCommandArgument::REQUIRED, 'From Currency' ),
            new sfCommandArgument( 'to_currency', sfCommandArgument::REQUIRED, 'To Currency' ),
        ));

        $this->addOptions(array(
            //new sfCommandOption( 'output_file', null, sfCommandOption::PARAMETER_OPTIONAL, 'The path of the target Javascript file', null ),
        ));


        $this->name = 'update-currency-conversion-rates';
        //$this->aliases = array( $this->namespace. ':cs' );

        $this->briefDescription = 'Creates or updates a single CurrencyConversionRate for the currencies provided.';

    $this->detailedDescription = <<<EOF
Creates or updates a single CurrencyConversionRate for the currencies provided.
EOF;
    }


 /**
   * @see sfTask
   */
    protected function execute( $arguments = array(), $options = array() ) {

        // Initialize database
            $databaseManager = new sfDatabaseManager($this->configuration);           

            
        \CurrencyConversionRatePeer::CreateOrUpdateFromIsoCodes(
            $arguments['from_currency'],
            $arguments['to_currency']
        );
        
        
    }
}
