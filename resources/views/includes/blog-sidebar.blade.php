<div class="col-xl-3 col-lg-4 order-lg-1">
    <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
    <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i
                class="icon-x"></i></span>
        <!-- Widget Search-->
        <section class="widget">
            <form action="{{ route('user.search') }}" class="input-group form-group"
                method="get"><span class="input-group-btn">
                    <button type="submit"><i class="icon-search"></i></button></span>
                <input class="form-control" name="search" type="text" placeholder="Search blog">
            </form>
        </section>
        <!-- Widget Categories-->
        <section class="widget widget-categories card rounded p-4 mt-n3">
            <h3 class="widget-title">Blog Categories</h3>
            <ul>
                @foreach ($categories as $category)
                <li><a
                    href="{{ route('user.blog.category', ['id'=>$category->id]) }}">{{ $category->name }}</a>
            </li>
                @endforeach
              
                

            </ul>
        </section>
        <!-- Widget Featured Posts-->
        <section class="widget widget-featured-posts card rounded p-4">
            <h3 class="widget-title">Most Recent Added Posts</h3>
            @foreach ($recent_blogs as $rblog)
                
            @endforeach
            <div class="entry">
                <div class="entry-thumb"><a
                        href="{{ route('user.blog_details', ['id'=>$rblog->id]) }}"><img
                            src="{{ asset('storage') }}/{{ $rblog->image }}"
                            alt="Post"></a></div>
                <div class="entry-content">
                    <h4 class="entry-title"><a
                            href="{{ route('user.blog_details', ['id'=>$rblog->id]) }}">
                            {{ $rblog->title }}

                        </a></h4><span class="entry-meta">by Admin</span>
                </div>
            </div>
        </section>
    </aside>
</div>