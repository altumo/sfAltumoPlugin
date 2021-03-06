<?php
/*
 * This file is part of the sfAltumoPlugin library.
 *
 * (c) Steve Sperandeo <steve.sperandeo@altumo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace sfAltumoPlugin\Frontend;



/**
* NOTE:
* 
* This class is being re-examined to use a new JS frontend framework and minifier.
* Closure has been removed, and so app.js and app-deps.js will not be generated
* until the new implementation is complete.
* 
* 
* 
* 
* 
* This class automates part of the process of loading and declaring javascript
* resources for the front end application.
* 
* Example code (typically would be in your layout)
*       
*       $frontend = \sfAltumoPlugin\Frontend\App::create(
*            'myApp'
*        );
*        
*        echo $frontend->initialize();
* 
*        // This will:
*           - Load all required javascriot libs ( jquery, [routing/model library TBA])
*           - Declare all base namespaces ( e.g. myApp, myApp.model, myApp.view )
*           - Load the application javascript(s)
*               - In production, testing and staging: app.js ( compiled application, from altumo:build )
*               - Otherwise, app-deps.js will be loaded ( generated bu altumo:build )
* 
* 
* 
*   NOTES: The js libraries loaded by this App are meant to be required by
*          the frontend application's MVC layer. No application
*          specific libraries should be added to this class nor any library that
*          is not needed by the backbone-based workflow. 
*
*   TODOS:
*       - Add ability for caller to specify which libraries and/or versions are loaded
*       - Add ability for caller to add more namespaces to be declared (?)
* 
* @author Juan Jaramillo <juan.jaramillo@altumo.com>
*/
class App{

    protected $namespace = null;
    protected $namespace_heap = array();
    protected $api_route = null;
    protected $config = null;


    /**
    * Get a new instance of App
    * 
    * @param string $namespace
    *   // Frontend application namespace. Can contain sub-namespaces
    *   // e.g. myApp or myApp.adminPanel
    * 
    * @param string $api_route
    *   // The root url for the frontend to communicate with i.e. the API.
    *   // e.g. /api
    *  
    * @param array $config
    *   // A set of key-value pairs that will be made available to the application
    *   // globally via the .config namespace.
    * 
    * @return \sfAltumoPlugin\Frontend\App
    */
    public static function create( $namespace, $api_route = '/api', $config = null ){
        
        if( !is_null( $config ) && !is_array($config) ){
            throw new \Exception( '$config is expected to be an array.' );
        }
        
        $app = new \sfAltumoPlugin\Frontend\App(
            $namespace
        );
        
        // add config items
            foreach( $config as $key => $value ){
                $app->addConfigItem( $key, $value );
            }
            
        $app->setApiRoute( $api_route );
        
        return $app;
        
    }


    /**
    * Constructor for this App.
    * 
    * @param string $namespace
    *   // Frontend application namespace. Can contain sub-namespaces
    *   // e.g. myApp or myApp.adminPanel
    * 
    * @return \sfAltumoPlugin\Frontend\App
    *   // $this
    */
    public function __construct( $namespace ){    
    
        $this->setNamespace( $namespace );
     
    }
    
    
    /**
    * Adds a config item (key-value pair). Config items get passed to the 
    * frontend app via the .config namespace.
    * 
    * @param string $key
    *   // a unique key for this config item
    * 
    * @param string $namespace
    *   // a namespace (e.g. myApp.config). 
    *   // defaults to getNamespace().'.config'
    *   
    * @param mixed $value
    *   // value for the config item. 
    * 
    * @return \sfAltumoPlugin\Frontend\App
    *   // $this
    */
    public function addConfigItem( $key, $value, $namespace = null ){
        
        if( is_null($namespace) ){
            $namespace = $this->getNamespace() . '.config';
        }
        
        $this->declareNamespace( $namespace );
        
        $key = \Altumo\Validation\Strings::assertNonEmptyString( $key );
        
        $key = $namespace . '.' . $key;
        
        $this->getConfig()->$key = $value;
        
        return $this;

    }
    

    /**
    * Returns the config array. Config items get passed to the 
    * frontend app via the .config namespace.
    * 
    * @return array
    */
    protected function &getConfig(){
        
        if( is_null($this->config) ){
            $this->config = new \stdClass();
        }
        
        return $this->config;
        
    }    
    
    
    /**
    * Sets the root url of the Api that the frontend will be using.
    * @return App
    *   // this App.
    */
    public function setApiRoute( $url ){
        
        $url = \Altumo\Validation\Strings::assertNonEmptyString( $url );
        
        $this->api_route = $url;
        
        $this->addConfigItem( 'api_route', $url, 'altumo.config' );
        
        return $this;
        
    }    
    
    
    /**
    * Returns the root url of the Api that the frontend will be using.
    * @return string
    */
    public function getApiRoute(){

        return $this->api_route;
        
    }


    /**
    * Adds an entry to the namespace heap. A namespace heap entry can be
    * a single valid javascript namespace or a subnamespace.
    * 
    * If $namespace already exists in the heap, it'll not be added again.
    * 
    * @param string $namespace
    *   // e.g. myApp or myApp.admin
    * 
    * @return App
    *   // this App.
    */
    public function declareNamespace( $namespace ){
        
        $this->namespace_heap[ $namespace ] = null;
        
        return $this;
        
    }    
    
    
    /**
    * Retrieve the current namespace heap array.
    * 
    * @return array
    *   // An array of unique strings representing namespaces in the heap
    */
    protected function getNamespaceHeap(){
    
        return array_keys( $this->namespace_heap );
        
    }
        
    
    /**
    * Clears the contents of the namespace heap.
    * 
    * @return App
    *   // this App.
    */
    protected function resetNamespaceHeap(){
    
        $this->namespace_heap = array();
        
        return $this;
        
    }
    
    
    /**
    * Sets the application's base namespace as well as any subnamespace that will
    * be used by the frontend.
    * 
    * Example for "myApp"
    * 
    *  - myApp
    *  - myApp.model
    *  - myApp.view
    * 
    * @param string $namespace
    *   // e.g. myApp
    * 
    * @throws \Exception
    *   // if $namespace is not a non-empty string.
    * 
    * @return App
    *   // this App.
    */
    protected function setNamespace( $namespace ){

        // clean up namespace before use
            $this->resetNamespaceHeap();
        
        // validate app namespace
            $this->namespace = \Altumo\Validation\Strings::assertNonEmptyString(
                $namespace,
                '$namespace must be a non-empty string' 
            );
        
        // add default app sub-namespaces
            $sub_namespaces = array(
                'model',
                'view',
                'app',
                'config'
            );
        
        // add main app namespace to the heap
            $this->declareNamespace( $this->namespace );
        
        // add sub-namespaces to the heap
            foreach( $sub_namespaces as $sub_namespace ){
                
                $this->declareNamespace( $this->namespace . '.' . $sub_namespace );
                
            }
        
        // add altumo namespaces to the heap
            $this->declareNamespace( 'altumo.app.App' );
        
        return $this;
        
    }
    
    
    /**
    * Getter for the namespace field on this App.
    * 
    * @return string
    */
    public function getNamespace(){
    
        return $this->namespace;
        
    }
    
    
    /**
    * Adds the JS libraries that are required by the Frontend App to the
    * response via sfContext.
    * 
    * @return App
    *   // this App.
    */
    protected function loadLibraries(){
        
        $javascripts = array();
        
        // jQuery
            $javascripts['jquery']          = '//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';   

        // Crockford's JSON library (used by backbone)
            $javascripts['json2']           = '/sfAltumoPlugin/js/altumo/vendor/douglascrockford/json2.js';
                    
        foreach( $javascripts as $javascript ){
            
            \sfContext::getInstance()->getResponse()->addJavaScript( $javascript, 'first' );
            
        }


        return $this;

    }    
    
    
    /**
    * Adds the JS libraries that are required by the Frontend App to the
    * response via sfContext.
    * 
    * @return App
    *   // this App.
    */
    protected function loadFrontendApp(){
        
        // If this is a development environment, add the deps file generated
        // by closure to tell the library where to include javascripts from.
/*            if( !in_array( 
                    \sfContext::getInstance()->getConfiguration()->getEnvironment(), 
                    array('prod', 'production', 'testing', 'staging') 
            )){
                
                $frontend_app = '/js/app-deps.js';

            } else {
                
                $frontend_app = '/js/app.js';
                
            }
        
        \sfContext::getInstance()->getResponse()->addJavaScript( $frontend_app, 'last' );*/
        
        return $this;

    }
    
    
    /**
    * Returns the JS required in order to declare the namespace(s) to be used
    * by the application.
    * 
    * @return string
    *   // javascript code.
    */
    protected function printNamespaceDeclarations(){
        
        $unique_namespaces = array();
        $output = '';
        
        foreach( $this->getNamespaceHeap() as $namespace ){
            
            $application_namespace = explode( '.', $namespace );
            
            for( $index = 0; $index < count( $application_namespace ); $index++ ){
                
               $namespace_name = implode( '.', array_slice($application_namespace, 0, $index + 1) );
               
               $unique_namespaces[$namespace_name] = null;

            }
            
        }
        
        $unique_namespaces = array_keys( $unique_namespaces );

        foreach( $unique_namespaces as $unique_namespace ){

            if( !preg_match('/\\./', $unique_namespace) ){

                $output .= 'var ';
            
            }
            
            $output .=  $unique_namespace . ' = ' . $unique_namespace . ' || {};' . "\n";

        }

        return $output;

    }

    
    /**
    * Returns the JS required in order to declare the config values being passed
    * to the frontend.
    * 
    * @return string
    *   // javascript code.
    */
    protected function declareConfig(){

        $output = '';
        
        foreach( $this->getConfig() as $key => $value ){
            
            $output .= $key . '=' . json_encode( $value ) . ';';
            
        }
        
        return $output;

    }
    

    /**
    * Initializes the JS Frontend to the application. 
    * 
    *   - loads JS libraries
    *   - declares namespaces
    *   - loads the frontend application
    * 
    * @return string
    *   // javascript code
    */
    public function initialize(){
        
        $this
            ->loadLibraries()
            ->loadFrontendApp();

        return
            $this->printNamespaceDeclarations() . "\n" .
            $this->declareConfig();
        
    }

}