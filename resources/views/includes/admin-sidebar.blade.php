<div class="sidebar">
    @php
        $settings=\App\Models\ManageSite::where('key','media')->first();
        $setting_value=json_decode($settings->value);
    @endphp

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('storage') }}/{{ $setting_value->logo }}"
                        alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Admin
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                </div>
            </div>

            <ul class="nav">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#category">
                        <i class="fas fa-list-alt"></i>
                        <p>Manage Categories</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav nav-collapse">
                            <li>
                                <a class="sub-link" href="{{ route('admin.category.index') }}">
                                    <span class="sub-item">Categories</span>
                                </a>
                            </li>
                            <li>
                                <a class="sub-link" href="{{ route('admin.sub-category.index') }}">
                                    <span class="sub-item">Sub categories</span>
                                </a>
                            </li>
                            <li>
                                <a class="sub-link" href="{{ route('admin.child-category.index') }}">
                                    <span class="sub-item">Child categories</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#items">
                        <i class="fab fa-product-hunt"></i>
                        <p>Manage Products</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="items">
                        <ul class="nav nav-collapse">
                            <li>
                                <a class="sub-link" href="{{ route('admin.brand.index') }}">
                                    <span class="sub-item">Brands</span>
                                </a>
                            </li>
                            <li>
                                <a class="sub-link" href="{{ route('admin.product.create') }}">
                                    <span class="sub-item">Add Product</span>
                                </a>
                            </li>
                            <li>
                                <a class="sub-link" href="{{ route('admin.product.index') }}">
                                    <span class="sub-item">All Products</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a data-toggle="collapse" href="#order">
                        <i class="fab fa-first-order"></i>
                        <p>Manage Orders </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="order">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a class="sub-link" href="{{ route('admin.all.order') }}">
                                    <span class="sub-item">All Orders</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sub-link"
                                    href="{{ route('admin.pending.order') }}">
                                    <span class="sub-item">Pending Orders</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sub-link"
                                    href="{{ route('admin.progress.order') }}">
                                    <span class="sub-item">Progress Orders</span>
                                </a>
                            </li>

                            <li class="">
                                <a class="sub-link"
                                    href="{{ route('admin.delivered.order') }}">
                                    <span class="sub-item">Delivered Orders</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sub-link"
                                    href="{{ route('admin.canceled.order') }}">
                                    <span class="sub-item">Canceled Orders</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.transactions') }}">
                        <i class="fas fa-random"></i>
                        <p>Transactions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customer') }}">
                        <i class="fas fa-users"></i>
                        <p>Customer List</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="https://geniusdevs.com/codecanyon/omnimart40/admin/ticket">
                        <i class="fas fa-comments"></i>
                        <p>Manages Tickets</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a data-toggle="collapse" href="#content">
                        <i class="fas fa-tasks"></i>
                        <p>Manage Site</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="content">
                        <ul class="nav nav-collapse">
                            <li>
                                <a class="sub-link"
                                    href="{{ route('admin.manage-site.index') }}">
                                    <span class="sub-item">General Settings</span>
                                </a>
                            </li> 
                            <li>
                                <a class="sub-link" href="{{ route('admin.slider.index') }}">
                                    <span class="sub-item">Sliders</span>
                                </a>
                            </li>

                            <li>
                                <a class="sub-link" href="{{ route('admin.service.index') }}">
                                    <span class="sub-item">Services</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#faqs">
                        <i class="fas fa-question-circle"></i>
                        <p>Manage Faqs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="faqs">
                        <ul class="nav nav-collapse">
                            <li>
                                <a class="sub-link" href="{{ route('admin.faq-category.index') }}">
                                    <span class="sub-item">Categories</span>
                                </a>
                            </li>
                            <li>
                                <a class="sub-link" href="{{ route('admin.faq.index') }}">
                                    <span class="sub-item">Faqs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#post">
                        <i class="fas fa-rss-square"></i>
                        <p>Manage Blogs</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="post">
                        <ul class="nav nav-collapse">
                            <li>
                                <a class="sub-link" href="{{ route('admin.blog-category.index') }}">
                                    <span class="sub-item">Categories</span>
                                </a>
                            </li>
                            <li>
                                <a class="sub-link" href="{{ route('admin.blog.index') }}">
                                    <span class="sub-item">Blogs</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
