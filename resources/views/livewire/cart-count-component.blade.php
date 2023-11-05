<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="/cart">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>cart-heart</title><path d="M9 20C9 21.1 8.1 22 7 22S5 21.1 5 20 5.9 18 7 18 9 18.9 9 20M17 18C15.9 18 15 18.9 15 20S15.9 22 17 22 19 21.1 19 20 18.1 18 17 18M7.2 14.8V14.7L8.1 13H15.5C16.2 13 16.9 12.6 17.2 12L21.1 5L19.4 4L15.5 11H8.5L4.3 2H1V4H3L6.6 11.6L5.2 14C5.1 14.3 5 14.6 5 15C5 16.1 5.9 17 7 17H19V15H7.4C7.3 15 7.2 14.9 7.2 14.8M12 9.3L11.4 8.8C9.4 6.9 8 5.7 8 4.2C8 3 9 2 10.2 2C10.9 2 11.6 2.3 12 2.8C12.4 2.3 13.1 2 13.8 2C15 2 16 2.9 16 4.2C16 5.7 14.6 6.9 12.6 8.8L12 9.3Z" /></svg>
        @if(Cart::instance('cart')->count()>0)
        <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
        @else
        <span class="pro-count blue">0</span>
        @endif
    </a>
    <a href="/cart"><span class="text-light" style="font-size:12px;font-weight:900;">Cart</span></a>
    @if(Cart::instance('cart')->count() > 0)
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach(Cart::instance('cart')->content() as $item)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{route('product-detail',['id'=>$item->id])}}"><img alt="Nest" src="{{asset('assets/images')}}/{{$item->model->front_image}}" /></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{route('product-detail',['id'=>$item->id])}}">{{$item->model->name}}</a></h4>
                    <h4><span>{{$item->qty}} × </span>Rs.{{$item->model->price}}</h4>
                </div>
                <div class="shopping-cart-delete">
                    <a href="#"><i class="fa fa-angle-down"></i></a>
                </div>
            </li>
            @endforeach
            
        </ul>
        
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>Rs.{{Cart::total()}}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="/cart" class="outline">View cart</a>
                <a href="/checkout">Checkout</a>
            </div>
        </div>
    </div>
    @endif
</div>