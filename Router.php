<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liyajie1209
 * Date: 9/9/13
 * Time: 4:43 PM
 * To change this template use File | Settings | File Templates.
 */
class Router
{

    static protected $instance;
    static protected $params;
    static protected $rules;

    public static function getInstance() {
        if(isset(self::$instance) and (self::$instance instanceof self)) {
            return self::$instance;
        } else {
            self::$instance = new self();
            return self::$instance;
        }
    }

    /**
     * parse param
     * home/:id/param
     * @param $ruleKey
     * @param $url
     */
    private static function ruleMatch($ruleKey,$url) {
        $items = explode('/',$ruleKey);
        $dataItems = explode('/',$url);
        self::cleanEmptyItems(&$items);
        self::cleanEmptyItems(&$dataItems);
//        print_r($items);
//        print_r($dataItems);
        if(count($items) == count($dataItems)) {
            $result = array();
            foreach($items as $key => $value) {
                if(preg_match('/^:[\w]{1,}$/',$value)){
                    $result[$value] = $dataItems[$key];
                }
                else {
                    if(strcmp($value,$dataItems[$key]) != 0) {
                        return false;
                    }
                }
            }
            if(count($result) > 0) return $result;
            unset($result);
        }

        return false;
    }

    private static function cleanEmptyItems($array) {
        foreach($array as $key => $value) {
            if(strlen($value) == 0) {
                unset($array[$key]);
            }
        }
    }
    private static function defaultRoutes($url) {
        // process default routes
        print $url;
        $items = explode('/',$url);

        // remove empty blocks
        foreach($items as $key => $value) {
            if (strlen($value) == 0) unset($items[$key]);
        }

        // extract data
        if (count($items)) {
//            self::$controller = array_shift($items);
//            self::$action = array_shift($items);
            self::$params = $items;
        }
    }

    protected function __construct() {
        self::$rules = array();
    }

    /**
     * router start
     */
    public static function start() {
        $url = $_SERVER['REQUEST_URI'];
        if(count(self::$rules)) {
            foreach(self::$rules as $ruleKey => $ruleValue) {
                $params = self::ruleMatch($ruleKey,$url);
                print_r($params);
                if($params) {
                    break;
                }
            }
        } else {
            self::defaultRoutes($url);
        }


//        if (!strlen(self::$controller)) self::$controller = 'home';
//        if (!strlen(self::$action)) self::$action = 'index';
    }

    /**
     * add new rule
     * @param $rule
     * @param $target
     */
    public static function addRule($rule,$target) {
//        $url = $_SERVER['REQUEST_URI'];
        self::$rules[$rule]= $target;
    }

    public static function getParams() {
        return self::$params;
    }

    public static function getParam($key) {
        return self::$params[$key];
    }
}
