@push('title')
Editors Create
@endpush

<div>
<!-- ======= Header ======= -->
    <div wire:ignore>
        @livewire('layouts.header')
    </div>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @livewire('layouts.sidebar')
    <!-- End Sidebar-->

    <x-form pageTitle='Editors Create'>
        <x-form-input-field.general col="col-6" lable="Editors name" name="name" type="text" wireModel='name'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors email" name="email" type="email" wireModel='email'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors phone" name="phone" type="text" wireModel='phone'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors address" name="address" type="text" wireModel='address'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors city" name="city" type="text" wireModel='city'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors state" name="state" type="text" wireModel='state'>
        </x-form-input-field.general>
        <x-form-input-field.general col="col-6" lable="Editors password" name="password" type="password" wireModel='password'>
        </x-form-input-field.general>


        <x-form-input-field.submit color='primary' buttonName="Save"></x-form-input-field.submit>
    </x-form>

    <!-- ======= Footer ======= -->
    @livewire('layouts.footer')
    <!-- End Footer -->

</div>