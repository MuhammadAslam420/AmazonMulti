<div class="search-style-2" style="min-width:820px;" wire:ignore>
    <form method="get" action="{{ route('search') }}">


        <select class="from-control" name="category_id" style="width:90px;border-right:1px solid;">
            <option value=''>All</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
        <div class="d-flex">
            <input type="text" style="min-width:650px;" name="search"  placeholder="Search for items..."   />
        <button type="submit" class="btn bg-warning" style="margin-right:-105px;border-radius:1px;"><i class="fa fa-search"></i></button>
            
        </div>
        <input type="hidden" name="product_cat" value="{{ $product_cat }}" id="product-cate">
        <input type="hidden" name="product_cat_id" value="{{ $product_cat_id }}" id="product-cate-id">
        <a href="#" class="link-control" style="display:none;">{{Str_split($product_cat,12)[0]}}</a>
    </form>
</div>
