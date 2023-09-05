<?php

namespace App\Http\Livewire\Products;

use App\Http\ServiceTraits\ProductsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Section;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsUpdateController extends Component
{
    use ProductsService, WithFileUploads, FileTrait, CreateSlugTrait;

    public string $pageUrl = 'update';
    public int $productId;

    public function mount($id): void
    {
        $this->productId = $id;
        $products        = Product::where('id', $id)->get();
        foreach ($products as $product) {
            $this->name             = $product->name;
            $this->slug             = $product->slug;
            $this->sku              = $product->sku;
            $this->sale_price       = $product->sale_price;
            $this->original_price   = $product->original_price;
            $this->qty_in_stock     = $product->qty_in_stock;
            $this->stock_status     = $product->stock_status;
            $this->status           = $product->status;
            $this->selectedCategory = $product->category_id;
            $this->sub_category_id  = $product->sub_category_id;
            $this->brand_id         = $product->brand_id;
            $this->tags             = $product->tags;
            $this->description      = $product->description;
            $this->specification    = $product->specification;
            $this->oldImage         = $product->image;
            $this->oldGallery       = $product->gallery;
        }
        $this->categories    = Category::all('id', 'name');
        $this->subCategories = SubCategory::all('id', 'name');
    }

    public function save(): void
    {
        $product = Product::whereId($this->productId)->update($this->beforeProductSaveFunc()['validate']);
        if (!empty($this->beforeProductSaveFunc()['attribute'])) {
            if ($this->beforeProductSaveFunc()['attribute']['color_attribute_values'] !== '') {
                ProductAttribute::where('product_id', $product)->update($this->beforeProductSaveFunc()['attribute']);
            }
        }
        $this->dispatchBrowserEvent('success-toast', ['message' => 'Updated record!']);
    }

    public function render(Request $request)
    {
        $sections = Section::all('id', 'name');
        $brands   = Brand::all('id', 'name');
        $allTags  = Tag::all('id', 'keyword');
        $attributes = Attribute::with('attributeOption:attribute_id,value')->get(['id', 'name']);
        return view('livewire.products.products-update', [
            'sections' => $sections,
            'brands'   => $brands,
            'allTags'  => $allTags,
            'attributes' => $attributes,
        ]);
    }
}
