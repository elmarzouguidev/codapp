<?php

namespace App\Http\Livewire\Product;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Support\Facades\Gate;

class Products extends Component
{
    use WithPagination, AuthorizesRequests;

    public $isUpdate = false;

    public $productId;
    public $categories;
    public $selected = []; //when user click to checkbox

    public $filter = [];

    public $data = [];

    public $allowedsFilters = [];

    public $fields = [
        'name' => '',
        'photo' => '',
        'description' => '',
        'quantity' => '',
        'price' => '',
        'category_id' => '',
    ];

    protected $model;

    protected $paginationTheme = 'bootstrap';
    // protected $updatesQueryString = ['filter'];

    public function mount(

        ProductService $product,
        CategoryService $category
    ) {
        //$this->categories = $category->all();
        $this->categories = $category->getInstance()->selectWithType(['name', 'id'], 'products');
        $this->model = $product;
    }


    /**
     * @param ProductService $product
     * @return Application|Factory|View
     */
    public function render(ProductService $product)
    {

        return view('livewire.product.products', [

            'products' =>    $product->getInstance()->withRelations(['category', 'commands'])
                ->withCount('commands')
                ->paginate(10),
            // 'products' =>    $product->paginate(10)
        ]);
    }


    public function setfilter()
    {
        if (!$this->data || !isset($this->data)) {

            return $this->sendNotificationTobrowser(
                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.filter.warning')
                ]
            );
        }

        if (isset($this->data) && is_array($this->data) && array_key_exists('from_to', $this->data)) {
            $this->data['from_to'] = implode(',', array_reverse($this->data['from_to']));
        }
        $this->data = array_filter(array_map('trim', $this->data));

        $this->filter = $this->data;
        $this->data = null;
    }

    /**
     * @param ProductService $newproduct
     * @param AuthService $auth
     */
    public function submit(ProductService $newproduct)
    {

        $product = $newproduct->execute('create', $this->fields);

        if ($product) {
            $this->resetIput();

            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }


    private function permission()
    {
        // $this->authorize('update', $lead);
        $response = Gate::inspect('update', $product);

        if (!$response->allowed()) {
            $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.permission.update')
                ]
            );
            return;
        }
    }

    /**
     * @param ProductService $edit
     * @param $id
     */
    public function editProduct(ProductService $edit, $id)
    {
        $product = $edit->getInstance()->findOrFail($id);

        $this->productId = $product->id;
        $this->isUpdate = true;
        $this->fields = $product->toArray();
    }

    /**
     * @param ProductService $upProduct
     */
    public function update(ProductService $upProduct)
    {

        $product = $upProduct->getInstance()->findOrFail($this->productId);

        if ($this->fields === $product->toArray()) {
            return  $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );
        }
        if ($this->productId) {

            $product = $upProduct->execute('update', $this->fields);

            if ($product) {
                $this->resetIput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.updated.ok')
                    ]
                );
            }
        }
    }

    /**
     * @param ProductService $deleteProduct
     * @param $id
     * @return bool|void
     */
    public function deleteProduct(ProductService $deleteProduct, $id)
    {
        if ($id) {
            return  $deleteProduct->getInstance()->delete($id) ?
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.deleted.ok')
                    ]
                )
                :
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'error',
                        'message' => trans('messages.deleted.no')
                    ]
                );
        }
        return false;
    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetIput();
    }

    /**** private method ***/
    private function resetIput()
    {
        $this->fields = null;
    }

    /*****Multi action  Elmarzougui Abdelghafour at haymacproduction */


    /**
     * @param ProductService $products
     */
    public function deleteMultiProducts(ProductService $products)
    {
        if (!$this->selected) {

            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('productData.product.export.select')
                ]
            );
        }
        if ($this->selected) {
            $products->getInstance()->destroy(array_filter($this->selected));
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('productData.product.delete.success')
                ]
            );
            // return redirect()->route('admin.leads');
        }
        return $this->sendNotificationTobrowser(

            [
                'type' => 'error',
                'message' => trans('productData.product.delete.success')
            ]
        );
        //return redirect(route('admin.leads'))->withError('Sorry problem detected');
    }

    /**
     * @param array $options
     */
    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
