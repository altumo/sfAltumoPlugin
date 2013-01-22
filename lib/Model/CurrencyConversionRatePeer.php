<?php



/**
 * Skeleton subclass for performing query and update operations on the 'contact' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */

namespace sfAltumoPlugin\Model;

class CurrencyConversionRatePeer extends \BaseCurrencyConversionRatePeer {


    /**
    * Returns a CurrencyConversionRate corresponding to the from and to currency
    * iso codes given.
    * 
    * If one does not exist, null is returned.
    * 
    * @param string $from_iso_code
    *   // Currency ISO code
    * 
    * @param mixed $to_iso_code
    *   // Currency ISO code
    * 
    * @return \CurrencyConversionRate
    */
    public static function retrieveByIsoCodes( $from_iso_code, $to_iso_code ){
        
        $from_iso_code = \Altumo\Validation\Strings::assertNonEmptyString(
            $from_iso_code,
            '$from_iso_code expects non-empty string'
        );   
             
        $to_iso_code = \Altumo\Validation\Strings::assertNonEmptyString(
            $to_iso_code,
            '$to_iso_code expects non-empty string'
        );
        
        $from_currency = \CurrencyPeer::retrieveByIsoCode( $from_iso_code );
        $to_currency = \CurrencyPeer::retrieveByIsoCode( $to_iso_code );
        
        if( is_null($from_currency) ){
            throw new \Exception( "Currency {$from_currency} does not exist." );
        }        
        
        if( is_null($to_currency) ){
            throw new \Exception( "Currency {$to_currency} does not exist." );
        }
        
        return CurrencyConversionRateQuery::create()
            ->filterByCurrencyRelatedByFromCurrencyId( $from_currency )
            ->filterByCurrencyRelatedByToCurrencyId( $to_currency )
        ->findOne();
        
    }
 

    /**
    * Creates or updates a CurrencyConversionRate based on the currency iso codes
    * given.
    * 
    * If one does not exist, null is returned.
    * 
    * @param string $from_iso_code
    *   // Currency ISO code
    * 
    * @param mixed $to_iso_code
    *   // Currency ISO code
    * 
    * @return \CurrencyConversionRate
    */
    public static function createOrUpdateFromIsoCodes( $from_iso_code, $to_iso_code ){

        $conversion_rate = self::retrieveByIsoCodes( $from_iso_code, $to_iso_code );
        
        $from_currency = \CurrencyPeer::retrieveByIsoCode( $from_iso_code );
        $to_currency = \CurrencyPeer::retrieveByIsoCode( $to_iso_code );
        
        if( is_null($conversion_rate) ){
            
            $conversion_rate = new \CurrencyConversionRate();
                $conversion_rate->setCurrencyRelatedByFromCurrencyId( $from_currency );
                $conversion_rate->setCurrencyRelatedByToCurrencyId( $to_currency );

        }

        $conversion_rate = \CurrencyConversionRateQuery::create()
            ->filterByCurrencyRelatedByFromCurrencyId( $from_currency )
            ->filterByCurrencyRelatedByToCurrencyId( $to_currency )
        ->findOneOrCreate();
        
        $conversion_rate->setRate( self::requestUpdatedRate($from_iso_code, $to_iso_code) );
        $conversion_rate->save();

    }
    
    
    /**
    * Retrieves a currency conversion rate from a remote system and returns it.
    * 
    * @param string $from_iso_code
    *   // Currency ISO code
    * 
    * @param mixed $to_iso_code
    *   // Currency ISO code
    * 
    * @return float
    * 
    */
    protected static function requestUpdatedRate( $from_iso_code, $to_iso_code ){
        
        $from_iso_code = \Altumo\Validation\Strings::assertNonEmptyString(
            $from_iso_code,
            '$from_iso_code expects non-empty string'
        );   
             
        $to_iso_code = \Altumo\Validation\Strings::assertNonEmptyString(
            $to_iso_code,
            '$to_iso_code expects non-empty string'
        );
        
        // Get exchange rate from yahoo finance.
            $query = "{$from_iso_code}{$to_iso_code}=X";

            $url = 'http://download.finance.yahoo.com/d/quotes.csv?s=' . $query . '&f=l1&e=.cs';

            $http_request = new \Altumo\Http\OutgoingHttpRequest( $url );
            $http_request->setHeaders(
                array( 
                    'User-Agent'        => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.60 Safari/537.11', 
                    'Content-Type'      => 'application/x-www-form-urlencoded; charset=UTF-8',
                    'X-Requested-With'  => 'XMLHttpRequest'
                )
            );

            $response = \Altumo\Validation\Numerics::assertPositiveDouble(
                trim($http_request->sendAndGetResponseMessage()->getRawMessageBody()),
                'Unable to update currency exchange rate. Invalid response received.'
            );      
        
            
            return (float)$response;
        
            // Google implementation (unsupported by google, likely unreliable).
              /*  $query = "1{$from_iso_code}=?{$to_iso_code}";

                $url = 'http://www.google.com/ig/calculator?hl=en&q=' . urlencode($query);

                $http_request = new \Altumo\Http\OutgoingHttpRequest( $url );
                $http_request->setHeaders(
                    array( 
                        'User-Agent'        => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.60 Safari/537.11', 
                        'Content-Type'      => 'application/x-www-form-urlencoded; charset=UTF-8',
                        'X-Requested-With'  => 'XMLHttpRequest'
                    )
                );
                $response = $http_request->sendAndGetResponseMessage()->getRawMessageBody();

                if( preg_match('/^.*?rhs\\:.*?([-+]?\\b[0-9]+(\\.[0-9]+)?\\b)/m', $response, $matches) ){
                    $rate = $matches[1];
                } else {
                    throw new \Exception( 'Error retrieving an updated currency conversion rate. (unexpected format)' );
                }*/

    }
    
    
}
