<div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@yield('content-title')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Home</a></li>
                            @stack('breadcrumb')
                        </ol>
                    </div>
                    @include('_partials_.quick_review')
</div>
