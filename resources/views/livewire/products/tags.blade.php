
@push('title')
Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->

    <x-table pageTitle='Tags Table' pageUrl='Tags' tableName="Tags Table" :columnNamesArr='$columnNamesArr'
        :tableData='$tags' :tableDataColumnNames='$tableDataColumnNames' :relation='false' relationName=''
        :hideBtn='true' :isBoolean='false' booleanColName='status' booleanAttributes=''
        booleanColNames=''>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>