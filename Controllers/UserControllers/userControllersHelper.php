<?php
class UserControllerHelper
{
    public static function incrementData( $uniqueIdentifier,$UniqueIdentifierName, $columnName)
    {
        $object=unserialize($_SESSION['user']);
        $value = intval(UserMapper::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
        if (is_int($value)) {
            UserMapper::edit($uniqueIdentifier, array($columnName => ++$value),$UniqueIdentifierName);
            call_user_func([$object->builder, 'set'.ucfirst($columnName)], $value);
            $_SESSION['user']=serialize($object);
        }
        else {
            echo 'Error in updating data';
        }
    }

    public static function incrementDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
    {
        $value = intval(UserMapper::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
        if (is_int($value)) {
            UserMapper::edit($uniqueIdentifier, array($columnName => ++$value),$UniqueIdentifierName);
        }
        else {
            echo 'Error in updating data';
        }
    }

    public static function decreaseData( $uniqueIdentifier,$UniqueIdentifierName, $columnName)
    {
        $object=unserialize($_SESSION['user']);
        $value = intval(UserMapper::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
        if (is_int($value)) {
            UserMapper::edit($uniqueIdentifier, array($columnName => --$value),$UniqueIdentifierName);
            call_user_func([$object->builder, 'set'.ucfirst($columnName)], $value);
            $_SESSION['user']=serialize($object);
        }
        else {
            echo 'Error in updating data';
        }
    }
    public static function decreaseDataDB($uniqueIdentifier ,$UniqueIdentifierName, $columnName )
    {
        $value = intval(UserMapper::selectSpecificAttr($uniqueIdentifier ,$UniqueIdentifierName, $columnName));
        if (is_int($value)) {
            UserMapper::edit($uniqueIdentifier, array($columnName => --$value),$UniqueIdentifierName);
        }
        else {
            echo 'Error in updating data';
        }
    }
}
?>
