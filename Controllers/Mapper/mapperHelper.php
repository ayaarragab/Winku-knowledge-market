<?php
class MapperHelper{
    public static function extractData($attrsArray, $object)
    {
        $reflectionClass = new ReflectionClass($object);
        $methods = $reflectionClass->getMethods();
        $columnsAndValues = array();
        for ($i=0; $i <count($attrsArray) ; $i++) { 
            foreach ($methods as $method) {
                $methodName = $method->getName();
                if (strpos($methodName, 'get') === 0 && $method->getNumberOfParameters() === 0) {
                    if (stripos($methodName, $attrsArray[$i]) !== false) {
                        $columnsAndValues[$attrsArray[$i]] = $method->invoke($object);
                        break; // Exit the inner loop once the method is found
                    }
                }
            }        
        }      
        return $columnsAndValues;
    }
    public static function extractDataSubcategory($attrsArray, $object)
    {
        $reflectionClass = new ReflectionClass($object);
        $methods = $reflectionClass->getMethods();
        $columnsAndValues = array();
        for ($i=0; $i <count($attrsArray) ; $i++) { 
            foreach ($methods as $method) {
                $methodName = $method->getName();
                if (strpos($methodName, 'get') === 0 && $method->getNumberOfParameters() === 0) {
                    if (stripos($methodName, $attrsArray[$i]) !== false) {
                        if ($attrsArray[$i] == 'name') {
                            if ($methodName == 'getName') {
                                $columnsAndValues[$attrsArray[$i]] = $method->invoke($object);
                                break;
                            }
                            else {
                                continue;
                            }
                        }
                        else
                        {
                            $columnsAndValues[$attrsArray[$i]] = $method->invoke($object);
                            break; // Exit the inner loop once the method is found
                        }
                    }
                }
            }        
        }      
        return $columnsAndValues;
    }
}