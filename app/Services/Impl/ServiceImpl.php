<?php


namespace App\Services\Impl;


use App\Services\ServiceInterface;

class ServiceImpl implements ServiceInterface
{
        protected $repository;
    public function getAll()
    {
        $this->repository->getAll();
    }

    public function findById($id)
    {
       return $this->repository->findById($id);
    }

    public function create($request)
    {

    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        $obj = $this->repository->findById($id);
        return $this->repository->destroy($obj);
    }
}
