@extends('spark::layouts.app')

@push('scripts')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-100622268-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-100622268-2');
</script>
@endpush


@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    @if($subscribed)
                    <div class="card-header">{{__('Dashboard')}}</div>

                    <div class="card-body">
                        {{__('Your application\'s dashboard.')}}
                    </div>
                    @else
                    <div class="card-header">{{__('Dashboard')}}</div>

                    <div class="card-body">
                        Click <a href="/settings#/subscription">here</a> to subscribe to a premium plan.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</home>
@endsection