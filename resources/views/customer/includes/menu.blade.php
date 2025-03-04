<div class="card card-body">
    <div class="list-group">
        <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.dashboard' ? 'active' : '' }}" aria-current="true">
            My Dashboard
        </a>
        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.profile' ? 'active' : '' }}">My Profile</a>
        <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.order' ? 'active' : '' }}">My Order</a>
        <a href="{{route('customer.wishlist')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.wishlist' ? 'active' : '' }}">My Wishlist</a>
        <a href="{{route('customer.change-password')}}" class="list-group-item list-group-item-action {{\Request::route()->getName() == 'customer.change-password' ? 'active' : '' }}">Change Password</a>
        <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action">Logout</a>
    </div>
</div>
