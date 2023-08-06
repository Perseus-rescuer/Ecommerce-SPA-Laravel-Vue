<?php

namespace App\Http\Livewire\Products;

use App\Http\ServiceTraits\BrandsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrandsUpdateController extends Component {
    use WithFileUploads, FileTrait, CreateSlugTrait, BrandsService;

    public string $pageUrl = 'update';

    public function mount($id): void{
        $this->statusOption = ['Unpublish', 'Publish'];
        $this->brandId      = $id;
        $category       = Brand::find($this->brandId, ['name', 'image', 'slug', 'status']);
        $this->name     = $category->name;
        $this->image    = $category->image;
        $this->oldImage = $category->image;
        $this->slug     = $category->slug;
        $this->status   = $category->status;
    }

    public function save() {
        $validate = $this->validate();
        (gettype($this->image) == 'object') ? $validate['image'] = $this->fileUpload($this->image, 'category') : null;
        Brand::where('id', $this->brandId)->update($validate);
        return redirect()->route('brands');
    }

    public function render() {
        return view('livewire.products.brands-update');
    }
}