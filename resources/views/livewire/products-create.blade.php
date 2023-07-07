@push('title')
Product Create
@endpush

<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->
    <x-form pageTitle='Products Create' pageUrl='products / create' enctype="multipart/form-data">
        <x-form-input-field.general col="col-6" lable="Product title" name="title" type="text" wireModel='title'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Slug" name="slug" type="text" wireModel='slug'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="SKU" name="sku" type="text" wireModel='sku'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Price" name="price" type="text" wireModel='price'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Discount Price" name="discountPrice" type="text"
            wireModel='discountPrice'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Qty In Stock" name="qtyInStock" type="text"
            wireModel='qtyInStock'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-3" lable="Stock Status" name="stockStatus" type="text"
            wireModel='stockStatus'>
        </x-form-input-field.general>


        <x-form-input-field.select col='col-4' defaultOption='Select Section' :options='$sections'
            wireModel='selectedSection' colName='name' name="selectedSection">
        </x-form-input-field.select>
        <x-form-input-field.select col='col-4' defaultOption='Select Category' :options='$categories'
            wireModel='selectedCategory' colName='name' name="selectedCategory">
        </x-form-input-field.select>
        <x-form-input-field.select col='col-4' defaultOption='Select Sub Category' :options='$subCategories'
            wireModel='selectedSubCategory' colName='name' name="selectedSubCategory">
        </x-form-input-field.select>


        <x-form-input-field.select col='col-3' defaultOption='Select Attributes' :options='$attributes'
            wireModel='selectedAttributes' colName='name' name="selectedAttributes">
        </x-form-input-field.select>

        <x-form-input-field.checkBox col='col-3' legend="Check Values" :options='$attributeValues'
            wireModel='attributeValuesId' name='attributeValuesId'>
        </x-form-input-field.checkBox>

        <x-form-input-field.text-area col="col-6" lable="Description" name="description" type="text"
            wireModel='description'>
        </x-form-input-field.text-area>

        <x-form-input-field.text-area col="col-6" lable="Short Description" name="shortDescription" type="text"
            wireModel='shortDescription'>
        </x-form-input-field.text-area>

        <x-form-input-field.file col="col-6" label="Upload Image" name="image" wireModel='image'>
        </x-form-input-field.file>
        <x-form-input-field.file col="col-6" label="Upload All Images" name="all_Images" wireModel='allImages' multiple="multiple">
        </x-form-input-field.file>

        <x-form-input-field.submit buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

</div>