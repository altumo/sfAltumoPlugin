<?php



/**
 * Skeleton subclass for representing a row from the 'contact' table.
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

class Contact extends \BaseContact{
    
        
    /**
    * Return the states' ISO code (e.g. CA-BC), else null if state is not set.
    * 
    * @return string
    */
    public function getStateIsoCode(){
        
        if( $state = $this->getState() ){
            return $state->getIsoCode();
        }
        
        return null;
        
    }
    
    
    /**
    * Return the states' ISO code (e.g. BC), else null if state is not set.
    * 
    * @return string
    */
    public function getStateIsoShortCode(){
        
        if( $state = $this->getState() ){
            return $state->getIsoShortCode();
        }
        
        return null;
        
    }    
    
    
    /**
    * Return the country's name (e.g. Canada), else null if state is not set.
    * 
    * @return string
    */
    public function getCountryName(){
        
        if( $state = $this->getState() ){
            return $state->getCountry()->getName();
        }
        
        return null;
        
    }    
    
    
    /**
    * Get state full name (e.g. British Columbia). Returns null if state is not
    * set.
    * 
    * @return string
    */
    public function getStateName(){
        
        if( $state = $this->getState() ){
            return $state->getName();
        }
        
        return null;
        
    }
    
    
    /**
    * Parses the Person's name and attempts to extract First, Middle and/or 
    * Last name.
    * 
    * @param string $full_name 
    *   // the full name to parse
    * 
    * @param string $get_part 
    *   // (first_name|middle_name|last_name|null) if null, an array of parts 
    *       will be returned.
    * 
    * @throws \Exception                    
    *   // if $get_part is invalid
    * 
    * 
    * @return string|array
    */
    protected static function parsePersonFullName( $full_name, $get_part = null ){

        // Validate Input
            if( !is_null($get_part) ){
                $valid_parts = array( 'first_name', 'middle_name', 'last_name' );
                if( !in_array($get_part, $valid_parts) ){
                    throw new \Exception( 'parsePersonFullName expects get_part to be one of: ' . implode( ', ', $valid_parts)  );
                }
            }

        // Split full name on spaces
            $name_parts = explode( ' ', trim( $full_name ) );


        // Parse name parts
            switch( count( $name_parts ) ){

                case 0:
                    return null;
                    break;

                case 1:
                    $parsed_name = array(
                        'first_name' => $name_parts[0],
                        'middle_name' => '',
                        'last_name' => ''
                    );
                    break;

                case 2:
                    $parsed_name = array(
                        'first_name' => $name_parts[0],
                        'middle_name' => '',
                        'last_name' => $name_parts[1]
                    );
                    break;

                case 3:
                    $parsed_name = array(
                        'first_name' => $name_parts[0],
                        'middle_name' => $name_parts[1],
                        'last_name' => $name_parts[2]
                    );
                    break;

                default:
                    $parsed_name = array(
                        'first_name' => $name_parts[0],
                        'middle_name' => $name_parts[1],
                        'last_name' => implode( ' ', array_slice( $name_parts, 2 ) )
                    );
            }
        
        if( !is_null( $get_part ) ){
            return $parsed_name[$get_part];
        } else {
            return $parsed_name;
        }
        
    }
    

} 
