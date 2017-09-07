<?php

namespace App\Traits;

trait SingleTableInheritance
{
    /**
     * @return bool
     */
    public function isSubClass()
    {
        return (get_parent_class($this) != static::class) && is_subclass_of($this, self::class);
    }

    /**
     * @return mixed
     */
    public function hasStiKey()
    {
        if (property_exists($this, 'stiKey')) {
            return $this->getStiKey();
        }
    }

    /**
     * @return mixed
     */
    public function getStiKey()
    {
        return $this->stiKey;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    protected function mapData(array $attributes)
    {
        if(! isset($attributes[$this->getStiKey()])) {
            return $this->newInstance();
        }

        return new $this->stiChildren[$attributes[$this->getStiKey()]];
    }

    /**
     * @param array $attributes
     * @param null $connection
     * @return mixed
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        $model = $this->mapData((array) $attributes)->newInstance([], true);

        $model->setRawAttributes((array) $attributes, true);

        $model->setConnection($connection ?: $this->getConnectionName());

        $model->fireModelEvent('retrieved', false);

        return $model;
    }

    /**
     * @return mixed
     */
    public function newQuery()
    {
        $builder = parent::newQuery();

        if($this->hasStiKey() && $this->isSubClass()) {
            $builder->where($this->getStiKey(), '=', array_flip($this->stiChildren)[get_class($this)]);
        }

        return $builder;
    }
}