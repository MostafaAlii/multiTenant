@include('dashboard.common.includes._tpl_start')
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('dashboard.common.includes._top_header')
            @include('dashboard.common.includes._toolbar')
            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                @include('dashboard.common._partials.messages')
                @include('dashboard.common.includes._sidebar')
                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    @yield('PageTitle')
                    @yield('content')
                </div>
                <!--end::Post-->
            </div>
            <!--end::Container-->
            @include('dashboard.common.includes._footer')
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
@include('dashboard.common.includes._tpl_end')