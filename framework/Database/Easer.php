<?php

namespace Sketch\Framework\Database;

use Sketch\Framework\Database\Connection;

abstract class Easer
{
    protected static $db;
    protected static $tableName;
    private $class;

    public function __construct() {
        self::$db = Connection::establish();
        $this->class = new \ReflectionClass($this);
        if ($this->table != '') {
            self::$tableName = $this->table;
        } else {
            self::$tableName = strtolower($this->class->getShortName());
        }
    }

    private function prepareParams($ignore = null)
    {
        $class = new \ReflectionClass($this);
        $props = [];
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();
            if($ignore != null) {
                if($propertyName != $ignore) {
                    $props[] = '`'.$propertyName.'` = "'.$this->{$propertyName}.'"';
                }
            }
            else {
                $props[] = '`' . $propertyName . '` = "' . $this->{$propertyName} . '"';
            }
        }
        return implode(',', $props);
    }

    public function update($id) {
        $set = $this->prepareParams();
        $query = "UPDATE " . self::$tableName . " SET " . $set . " WHERE id = " . $id;
        return self::$db->exec($query);
    }

    public function create() {
        $set = $this->prepareParams('id');
        $query = "INSERT INTO " . self::$tableName . " SET " . $set;
        return self::$db->exec($query);
    }

    public static function findById($id) {
        $query = "SELECT * FROM " . self::$tableName . " WHERE id =" .$id ;
        $result = self::$db->prepare($query);
        $result->execute();
        return $result->fetch();
    }

    public static function find($options = []) {
        $result = [];
        $whereClause = '';
        $whereConditions = [];
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                $whereConditions[] = '`'.$key.'` = "'.$value.'"';
            }
            $whereClause = " WHERE ".implode(' AND ',$whereConditions);
        }
        $query = "SELECT * FROM " . self::$tableName . $whereClause;
        $raw = self::$db->query($query);
        foreach ($raw as $row) {
            $result[] = self::transform($row);
        }
        return $result;
    }

    public static function transform(array $object) {
        $class = new \ReflectionClass(get_called_class());
        $item = $class->newInstance();

        foreach($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop) {
            if (isset($object[$prop->getName()])) {
                $prop->setValue($item,$object[$prop->getName()]);
            }
        }
        return $item;
    }
}