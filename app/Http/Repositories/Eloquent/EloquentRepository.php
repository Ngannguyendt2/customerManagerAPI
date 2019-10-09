<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\Repository;

abstract class EloquentRepository implements Repository
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        $result = $this->model->all();
        return $result;
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        $result = $this->model::find($id);
        return $result;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        try {
            $object = $this->model->create($data);
        } catch (\Exception $exception) {
            return null;
        }
        return $object;
    }

    public function destroy($object)
    {
        // TODO: Implement destroy() method.
        $object->delete();
    }

    public function update($data, $object)
    {
        // TODO: Implement update() method.
        $object->update($data);
        return $object;
    }
}
