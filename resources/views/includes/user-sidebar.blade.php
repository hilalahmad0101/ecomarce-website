<div class="col-lg-4">
    <aside class="user-info-wrapper">
        <div class="user-info">
            <div class="user-avatar">

                <img id="avater_photo_view"
                    src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/16385217454444.jpg"
                    alt="User">
            </div>

            <div class="user-data">
                <h4 class="h5">Alex Smith</h4><span>Joined Sep Mon 2021</span>
            </div>
        </div>
        <nav class="list-group">
            <a class="list-group-item " href="https://geniusdevs.com/codecanyon/omnimart40/user/dashboard"><i
                    class="icon-command"></i>Dashboard</a>
            <a class="list-group-item " href="https://geniusdevs.com/codecanyon/omnimart40/user/profile"><i
                    class="icon-user"></i>Profile</a>
            <a class="list-group-item " href="https://geniusdevs.com/codecanyon/omnimart40/user/ticket"><i
                    class="icon-file-text"></i>Support Ticket</a>
            <a class="list-group-item with-badge "
                href="{{ route('user.order') }}"><i
                    class="icon-shopping-bag"></i>Orders<span
                    class="badge badge-default badge-pill">21</span></a>
            <a class="list-group-item " href="https://geniusdevs.com/codecanyon/omnimart40/user/addresses"><i
                    class="icon-map-pin"></i>Address</a>
            <a class="list-group-item  with-badge active"
                href="https://geniusdevs.com/codecanyon/omnimart40/user/wishlists"><i
                    class="icon-heart"></i>Wishlist<span class="badge badge-default badge-pill">1</span></a>
            <a class="list-group-item remove-account with-badge" data-bs-toggle="modal" data-bs-target=".modal"
                href="javascript:;"><i class="icon-trash"></i>Delete Account</a>
            <a class="list-group-item with-badge"
                href="https://geniusdevs.com/codecanyon/omnimart40/user/logout"><i class="icon-log-out"></i>Log
                out</a>
        </nav>
    </aside>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are You Sure?</p>
                    <p>Do you remove you account?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="https://geniusdevs.com/codecanyon/omnimart40/admin/remove/account" type="button"
                        class="btn btn-danger">Remove Account</a>
                </div>
            </div>
        </div>
    </div>

</div>