<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/17
 * Time: 下午4:01
 */

namespace arrayAdapter;

use hellaEngine\support\Str;


/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/17
 * Time: 下午3:01
 */
class arrayAdapter extends \ArrayObject implements \JsonSerializable
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    /**
     * 原始数据
     * @var array
     */
    private $originData;
    /**
     * 当前数据
     * @var array
     */
    protected $data;
    /**
     * @var array
     */
    protected $keyMap = [];

    /**
     * arrayAdapter constructor.
     * @param array $data
     * @param array $keyMap
     */
    public function __construct(
        $data = [], array $keyMap = [])
    {
        if (!empty($keyMap)) {

            $this->keyMap = $keyMap;
        }
        $this->data = $this->originData = $data;
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param  string $key
     * @return mixed
     */
    protected function getAttributeFromArray($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }

    /**
     * Determine if a get mutator exists for an attribute.
     *
     * @param  string $key
     * @return bool
     */
    public function hasGetMutator($key)
    {
        return method_exists($this, 'get' . Str::studly($key) . 'Attribute');
    }

    /**
     * Get the value of an attribute using its mutator.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    protected function mutateAttribute($key, $value)
    {
        return $this->{'get' . Str::studly($key) . 'Attribute'}($value);
    }

    /**
     * Determine whether an attribute should be cast to a native type.
     *
     * @param  string $key
     * @return bool
     */
    protected function hasCast($key)
    {
        return array_key_exists($key, $this->casts);
    }

    /**
     * Get the type of cast for a model attribute.
     *
     * @param  string $key
     * @return string
     */
    protected function getCastType($key)
    {
        return trim(strtolower($this->casts[$key]));
    }

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    protected function castAttribute($key, $value)
    {
        if (is_null($value)) {
            return $value;
        }

        switch ($this->getCastType($key)) {
            case 'int':
            case 'integer':
                return (int)$value;
            case 'real':
            case 'float':
            case 'double':
                return (float)$value;
            case 'string':
                return (string)$value;
            case 'bool':
            case 'boolean':
                return (bool)$value;
            case 'object':
                return $this->fromJson($value, true);
            case 'array':
            case 'json':
                return $this->fromJson($value);
            case 'collection':
                return $value;
//                return new BaseCollection($this->fromJson($value));
            case 'date':
            case 'datetime':
                return $value;
//                return $this->asDateTime($value);
            default:
                return $value;
        }
    }

    /**
     * Get a plain attribute (not a relationship).
     *
     * @param  string $key
     * @return mixed
     */
    protected function getAttributeValue($key)
    {

        $key = $this->getOriginKey($key);

        $value = $this->getAttributeFromArray($key);

        // If the attribute has a get mutator, we will call that then return what
        // it returns as the value, which is useful for transforming values on
        // retrieval from the model to a form that is more useful for usage.
        if ($this->hasGetMutator($key)) {
            return $this->mutateAttribute($key, $value);
        }

        // If the attribute exists within the cast array, we will convert it to
        // an appropriate native PHP type dependant upon the associated value
        // given with the key in the pair. Dayle made this comment line up.
        if ($this->hasCast($key)) {
            $value = $this->castAttribute($key, $value);
        }


        return $value;
    }


    private function getOriginKey($index)
    {
        if (isset($this->keyMap[$index]) && !empty($this->keyMap[$index])) {
            return $this->keyMap[$index];
        }
        return $index;
    }

    public function offsetExists($index)
    {
        return isset($this->data[$this->getOriginKey($index)]);
    }

    public function offsetGet($index)
    {
        return $this->getAttributeValue($index);
    }


    /**
     * Set a given attribute on the model.
     *
     * @param  string $key
     * @param  mixed $value
     * @return $this
     */
    protected function setAttribute($key, $value)
    {
        $key = $this->getOriginKey($key);

        // First we will check for the presence of a mutator for the set operation
        // which simply lets the developers tweak the attribute as it is set on
        // the model, such as "json_encoding" an listing of data for storage.
        if ($this->hasSetMutator($key)) {
            $method = 'set' . Str::studly($key) . 'Attribute';

            return $this->{$method}($value);
        }


        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Determine if a set mutator exists for an attribute.
     *
     * @param  string $key
     * @return bool
     */
    public function hasSetMutator($key)
    {
        return method_exists($this, 'set' . Str::studly($key) . 'Attribute');
    }


    public function offsetSet($index, $newval)
    {
        $this->setAttribute($index, $newval);
    }


    public function offsetUnset($index)
    {
        unset($this->data[$this->getOriginKey($index)]);
    }

    public function count()
    {
        return count($this->data);
    }

    public function unserialize($serialized)
    {

        parent::unserialize($serialized);
    }

    public function serialize()
    {
        parent::serialize();
    }

    /**
     * Decode the given JSON back into an array or object.
     *
     * @param  string $value
     * @param  bool $asObject
     * @return mixed
     */
    public function fromJson($value, $asObject = false)
    {
        return json_decode($value, !$asObject);
    }

    public function toJson()
    {
        return json_encode($this->data);
    }

    function jsonSerialize()
    {
        $jsonDatas = $this->data;
        foreach ($this->keyMap as $key => $value) {

            $jsonDatas[$key] = $this->getAttributeValue($key);
        }
        return $jsonDatas;
    }


}