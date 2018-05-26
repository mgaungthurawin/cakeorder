<li class="{{ Request::is('category*') ? 'active' : '' }}">
    <a href="{!! route('category.index') !!}"><i class="fa fa-edit"></i><span>Category</span></a>
</li>

<li class="{{ Request::is('product*') ? 'active' : '' }}">
    <a href="{!! route('product.index') !!}"><i class="fa fa-edit"></i><span>Product</span></a>
</li>

<li class="{{ Request::is('orderlist*') ? 'active' : '' }}">
    <a href="{!! route('orderlist.index') !!}"><i class="fa fa-edit"></i><span>Order</span></a>
</li>

<li class="{{ Request::is('customer*') ? 'active' : '' }}">
    <a href="{!! url('/customer') !!}"><i class="fa fa-edit"></i><span>Customer</span></a>
</li>