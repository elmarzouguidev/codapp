<?php

namespace App\Repositories\Moderator;

use App\Models\Moderator;
use Illuminate\Cache\CacheManager;

class ModeratorCacheRepository  implements ModeratorRepositoryInterface
{

    protected $model;

    protected $cache;

    const TTL = 1440; // TTL(Time To Live) 1440 = 1day

    public function __construct(Moderator $model, CacheManager $cache)
    {

        $this->model = $model;
        $this->cache = $cache;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function select(array $fields)
    {
        return $this->cache->remember('moderators', self::TTL, function () use ($fields) {
            return $this->model->select($fields)->get();
        });
    }

    public function all()
    {
        //dd('from cache');
        return $this->cache->remember('moderators', self::TTL, function () {
            return $this->model->all();
        });
        // return $this->model->all();
    }

    public function find($id)
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

            return     $data;
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

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function paginate($page)
    {
        return $this->model->paginate($page);
    }

    public function with(array $relations)
    {
        return $this->query()->with($relations);
    }
}
