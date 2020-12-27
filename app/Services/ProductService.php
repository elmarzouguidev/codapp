<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProductService extends Servicer
{


    protected $model;

    private static $_instance = null;

    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $lead
     */
    public function __construct(ProductRepositoryInterface $product)
    {

        $this->model = $product;
    }

    /**
     * @return ProductRequest
     */
    protected function getRequest()
    {
        return  new ProductRequest();
    }

    /**
     * @return ProductRepositoryInterface|null
     */
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }


    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {

        $form = $this->getRequest();
        //array_merge($this->fields, ['addedby' => 'abdo'])
        $form->merge($data);
        $data = $form->validate($form->rules());
        $product =  $this->getInstance()->create($data);
        $product->admin()->associate(Auth::user())->save();
        return $product;
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function update(array $data)
    {
        $id = $data['id'];
        $form = $this->getRequest();
        $form->setId($id);
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->update($data, $id) ? true : false;
    }
}
