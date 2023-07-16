@push('title')
Sub Categories
@endpush
<div>
    <!-- ======= Header ======= -->
    <x-layouts.header></x-layouts.header>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <x-layouts.sidebar></x-layouts.sidebar>
    <!-- End Sidebar-->

    <!-- End Page Title -->

    <x-table pageTitle='Editors Table' pageUrl='Editors' tableName="Editors Table"
        :columnNamesArr='$columnNamesArr' :tableData='$editors' :tableDataColumnNames='$tableDataColumnNames'
        enum='' enumColName=''
        booleanColName='role' :booleanAttributes='$booleanAttributes' :booleanColNames='$booleanColNames'
        :relation='false' :hideBtn='false'>
    </x-table>

    <!-- End #main -->
    <!-- ======= Footer ======= -->
    <x-layouts.footer></x-layouts.footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</div>