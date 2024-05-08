<?php
class CategoryControllersHelper{

    public static function incrementDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
    {
        $value = intval(CategoryMapper::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
        if (is_int($value)) {
            CategoryMapper::edit($$uniqueIdentifier, array($columnName => ++$value),$UniqueIdentifierName);
        }
        else {
            echo 'Error in updating data';
        }
    }

    public static function decreaseDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
    {
        $value = intval(CategoryMapper::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
        if (is_int($value)) {
            CategoryMapper::edit($$uniqueIdentifier, array($columnName => --$value),$UniqueIdentifierName);
        }
        else {
            echo 'Error in updating data';
        }
    }
}
?>