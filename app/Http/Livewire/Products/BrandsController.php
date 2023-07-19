<?php

namespace App\Http\Livewire\Products;

use App\Http\Traits\TableHeaderTrait;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsController extends Component {
    use WithPagination, TableHeaderTrait;

    public array $booleanColNames;
    public array $booleanAttributes;

    public function mount(): void{
        $this->booleanAttributes = [
            ['Unpublish', 'Publish'],
        ];
        $this->booleanColNames = ['status'];

        $this->traitMount(
            ['Id', 'Image', 'Name', 'Slug', 'Status', 'Action'],
            ['id', 'image', 'name', 'slug', 'status']
        );
    }

    public function update($brandId) {
        return redirect()->route('brands.update', $brandId);
    }

    public function destroy($id): int {
        return Brand::destroy($id);
    }

    public function render() {
        $brands = Brand::where('name', 'LIKE', '%' . $this->searchStr . '%')
            ->paginate($this->showDataPerPage, [...$this->tableDataColumnNames]);

        return view('livewire.products.brands', [
            'brands' => $brands,
        ]);
    }
}
