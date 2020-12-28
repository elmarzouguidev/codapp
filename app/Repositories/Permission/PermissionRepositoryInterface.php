<?php

namespace App\Repositories\Permission;

interface PermissionRepositoryInterface{


    public function create($data);

    public function update($data,$id);

    public function query();

	public function all();

	public function find($id);

	public function select(array $attributes);

	public function delete($id);

	// more
}
