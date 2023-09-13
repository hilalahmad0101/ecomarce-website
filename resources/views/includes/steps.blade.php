<div class="steps flex-sm-nowrap mb-5"><a class="step {{ Request::routeIs('user.checkout') ? 'active':''}}"
    href="">
    <h4 class="step-title">1. Billing Address:</h4>
</a>
<a class="step {{ Request::routeIs('user.payment') ? 'active':''}}" href="{{ route('user.payment') }}">
    <h4 class="step-title">3. Review and pay</h4>
</a>
</div>