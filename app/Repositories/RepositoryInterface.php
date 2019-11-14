<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function getAll();

    public function create($obj);

    public function findById($id);

    public function update($obj);

    public function destroy($obj);
}
