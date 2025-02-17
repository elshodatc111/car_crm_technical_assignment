<?php
namespace App\Repositories;

interface CarRepositoryInterface
{
    public function all();
    public function create(array $data);
}