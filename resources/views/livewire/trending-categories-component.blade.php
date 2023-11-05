<div class="main-categori-wrap d-none d-lg-block" style="margin:1px;padding:1px;">
    <a class="categories-button-active" href="#">
        <span class="fa fa-th-list"></span> <span>All</span>
       
    </a>
    <div class="categories-dropdown-wrap categories-dropdown-active-large" style="margin-left:-12px;;margin-top:0;border-radius:1px;width:200px;">
                    <div class="bg-dark"  style="margin-left:-30px;margin-top:-30px;margin-right:-30px;padding:10px;">
                        <p class="text-light"><i class="fa fa-user-circle-o text-light"></i>&nbsp; Hi, <a href="{{route('login')}}" class="text-light" class="active">&nbsp;SignIn</a> </p>
                    </div>
        <div class="categori-dropdown-inner">
       
           
            <ul>
                @php
                $i=1;
                @endphp
                
               @foreach ($categories as $category)
              
               <li style="border:none;">
                <a href="{{ route('category',['id'=>$category->id])  }}" style="font-weight:900;fornt-size:22px;color:black;"><b>{{$i++}} .</b> {{ $category->name }}</a>
                <br>
                
                      @php
                         $subcategories=DB::table('sub_categories')->where('category_id',$category->id)->get();
                         @endphp
                         @if($subcategories)
                        
                                 
                               
                                    @foreach($subcategories as $cat)
                                      
                                       <li style="margin-top:-38px; padding:0;border:none;">
                                            <a href="{{ route('category',['id'=>$category->id])  }}" style="padding:1px;margin-left:25px;"><b>◉  &nbsp;</b>{{$cat->name}}</a>
                                       </li>
                                       
                                   
                                   
                                    @endforeach
                                
                         
                            @endif
                </li>

               @endforeach

            </ul>
      
        </div>

        <div class="more_categories"><span class="icon"></span> <a href="/shop"><span class="heading-sm-1">Shop Now...</span></a></div>
    </div>
</div>
