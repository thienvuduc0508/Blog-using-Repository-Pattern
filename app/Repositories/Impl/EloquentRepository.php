<?php


namespace App\Repositories\Impl;


use App\Repositories\RepositoryInterface;

Abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function __construct()
    {
        $this->setModel();
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create($obj)
    {
        return $this->model->create($obj);
    }
    public function update($obj)
    {
        return $obj->save();
    }
    public function destroy($obj)
    {
        return $obj->delete();
    }


}
