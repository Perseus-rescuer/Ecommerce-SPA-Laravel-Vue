<?php

namespace App\Http\Livewire\Categories;

use App\Http\ServiceTraits\SectionsService;
use App\Http\Traits\CreateSlugTrait;
use App\Http\Traits\FileTrait;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectionsCreateController extends Component {
    use WithFileUploads, CreateSlugTrait, FileTrait, SectionsService;

    public string $pageUrl = 'create';

    public function save(): bool{
        $validate          = $this->validate();
        $validate['image'] = $this->fileUpload($this->image, 'section');
        Section::create($validate);
        $this->propertyResetExcept();
        return true;
    }

    public function render() {
        return view('livewire.categories.sections-create');
    }
}