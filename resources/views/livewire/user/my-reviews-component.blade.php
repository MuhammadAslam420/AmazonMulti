<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fa fa-home mr-5"></i>Home</a>
                <i class="fa fa-user ml-2"></i> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            @if(Session::has('message'))
            <div class="alert alert-success text-light">{{Session::get('message')}}</div>
            @endif
            <div>
                <div class="container" style="padding:30px 0;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="review_form_wrapper">

                                <div id="comments">
                                    <h2 class="woocommerce-Reviews-title">Add Review for </h2>
                                    <ol class="commentlist">
                                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                            <div id="comment-20" class="comment_container">
                                                <img alt="" src="{{asset('assets/images')}}/{{$orderItem->product->front_image}}" alt="80" width="120">
                                                <div class="comment-text">

                                                    <p class="meta">
                                                        <strong class="woocommerce-review__author">{{$orderItem->product->name}}</strong>

                                                    </p>

                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div id="review_form">
                                    @if(Session::has('re_msg'))
                                    <div class="alert alert-success">{{Session::get('re_msg')}}</div>
                                    @endif
                                    <div id="respond" class="comment-respond">

                                        <form wire:submit.prevent="addReview" id="commentform" class="comment-form" novalidate="">

                                            <div class="comment-form-rating">
                                                <span>Your rating</span>
                                                <p class="stars">

                                                    <label for="rated-1"></label>
                                                    <input type="radio" id="rated-1" name="rating" value="1" wire:model="rating">
                                                    <label for="rated-2"></label>
                                                    <input type="radio" id="rated-2" name="rating" value="2" wire:model="rating">
                                                    <label for="rated-3"></label>
                                                    <input type="radio" id="rated-3" name="rating" value="3" wire:model="rating">
                                                    <label for="rated-4"></label>
                                                    <input type="radio" id="rated-4" name="rating" value="4" wire:model="rating">
                                                    <label for="rated-5"></label>
                                                    <input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="rating">
                                                    @error('rating')
                                                <p class="alert alert-danger">{{$message}}</p>@enderror
                                                </p>
                                            </div>

                                            <p class="comment-form-comment">
                                                <label for="comment">Your review <span class="required">*</span>
                                                </label>
                                                <textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
                                                @error('comment')
                                            <p class="alert alert-danger">{{$message}}</p>@enderror
                                            </p>
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="btn btn-success bg-success" value="Submit">
                                            </p>
                                        </form>

                                    </div><!-- .comment-respond-->
                                </div><!-- #review_form -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
