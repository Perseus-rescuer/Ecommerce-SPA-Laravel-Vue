<?php

namespace App\Http\ServiceTraits;

use App\Models\Category;
use App\Models\SubCategory;

trait ProductsService
{

    public string $name;
    public int $productId;
    public string $slug;
    public string $sku;
    public string $description;
    public int $sale_price;
    public int $original_price;
    public ?int $stock_status       = null;
    public ?int $status             = null;
    public array $stockStatusOption = ['Out of Stock', 'In Stock'];
    public array $statusOption      = ['Unpublish', 'Publish'];
    public int $qty_in_stock;
    public string $specification;
    public int $selectedSection;
    public int $selectedCategory;
    public ?object $categories = null;
    public ?object $subCategories = null;
    public int $sub_category_id;
    public int $brand_id;
    public ?string $tags;
    public array $selectedTags = [];
    public string $productAttribute = '';
    public string|array $selectedProductAttribute = [];
    public ?object $sections = null;
    public ?object $brands = null;
    public ?object $allTags = null;
    public ?object $allAttributes = null;


    public $image;
    public string $oldImage;
    public $gallery = [];
    public string $oldGallery;

    protected function rules()
    {
        if ($this->pageUrl == 'update') {
            $rulesForUpdate = [
                'name'             => 'required|string|max:255',
                'slug'             => 'required|string|max:255|unique:brands,slug,' . $this->productId,
                'sku'              => 'required|max:10',
                'sale_price'       => 'required|numeric',
                'original_price'   => 'nullable|numeric',
                'qty_in_stock'     => 'required|numeric',
                'stock_status'     => 'required|boolean',
                'status'           => 'required|boolean',
                'selectedCategory' => 'required|numeric',
                'sub_category_id'  => 'required|numeric',
                'brand_id'         => 'required|numeric',
                'description'      => 'required|string',
                'specification'    => 'required|string',
            ];

            if ($this->selectedTags) $rulesForUpdate['selectedTags'] = 'required|array';
            if (gettype($this->image) == 'object')  $rulesForUpdate['image'] = 'required|mimes:jpeg,png,jpg';
            if (gettype($this->gallery) == 'array' && !empty($this->gallery)) $rulesForUpdate['gallery'] = 'required|array';

            return $rulesForUpdate;
        } else {
            return [
                'name'             => 'required|string|max:255',
                'slug'             => 'required|string|max:255',
                'sku'              => 'required|max:10',
                'sale_price'       => 'numeric',
                'original_price'   => 'numeric',
                'qty_in_stock'     => 'numeric',
                'stock_status'     => 'required|boolean',
                'status'           => 'required|boolean',
                'selectedCategory' => 'required|numeric',
                'sub_category_id'  => 'required|numeric',
                'brand_id'         => 'required|numeric',
                'selectedTags'     => 'required|array',
                'description'      => 'required|string',
                'specification'    => 'required|string',
                'image'            => 'required|mimes:jpg,jpeg,png',
                'gallery'          => 'required|array',
            ];
        }
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function updatedSelectedSection(): void
    {
        $this->categories = Category::where('section_id', $this->selectedSection)
            ->get(['id', 'name']);
    }

    public function updatedSelectedCategory(): void
    {
        $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get(['id', 'name']);
    }

    public function beforeProductSaveFunc(): array
    {
        $validate                            = $this->validate();
        $validate['category_id']             = $validate['selectedCategory'];

        unset($validate['selectedCategory']);

        if ($this->selectedTags) {
            $validate['tags']                    = implode(',', $validate['selectedTags']);
            unset($validate['selectedTags']);
        }
        if ($this->selectedProductAttribute) {
            $attribute = [];
            foreach ($this->selectedProductAttribute as $key => $value) {
                if (!empty($value)) {
                    $attribute[] = ['attribute_id' => $key, 'value' => implode(',', $value)];
                }
            }
        }
        if (gettype($this->image) == 'object') $validate['image'] = $this->fileUpload($this->image, 'products');
        if (gettype($this->gallery == 'array') && !empty($this->gallery)) $validate['gallery'] = $this->fileUpload($this->gallery, 'products');

        return ['validate' => $validate, 'attribute' => $attribute ?? null];
    }
}
