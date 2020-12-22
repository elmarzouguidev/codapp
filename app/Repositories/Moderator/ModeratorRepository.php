<?php

namespace App\Repositories\Moderator;

use App\Models\Moderator;
use Illuminate\Database\Eloquent\Collection;

class ModeratorRepository implements ModeratorRepositoryInterface
{

	protected $model;

	public function __construct(Moderator $model)
	{

		$this->model = $model;
	}

    public function query()
    {
        return $this->model->query();
    }

	public function all(): Collection
	{
		return $this->model->all();
	}

	public function find(int $id)
	{
		return $this->model->find($id);
	}
	public function findOrFail(int $id)
	{
		return $this->model->findOrFail($id);
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	public function update(array $attributes, $id)
	{
		$data = $this->findOrFail($id);

		if ($data) {

			$data->update($attributes);

			return 	true;
		}
		return false;
	}

	public function delete(int $id)
	{
		if (intval($id)) {
			$data = $this->findOrFail($id);
			$data->delete();
			return true;
		}
		return false;
	}

	public function paginate($page)
	{
		return $this->model->paginate($page);
	}

	public function select(array $fields)
	{
		return $this->model->select($fields)->get();
	}

	public function with(array $relations)
    {
        return $this->query()->with($relations);
    }
}
