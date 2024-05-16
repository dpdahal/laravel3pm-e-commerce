<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route("dashboard")}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if(auth()->user()->role == "admin")
            <li class="nav-item">
                <a class="nav-link " href="{{route("users")}}">
                    <i class="bi bi-people"></i>
                    <span>Users</span>
                </a>
            </li><!-- End Dashboard Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-section" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Section</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-section" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('manage-section.create')}}">
                        <i class="bi bi-circle"></i><span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manage-section.index')}}">
                        <i class="bi bi-circle"></i><span>Show</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-category" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Category</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-category" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('manage-category.create')}}">
                        <i class="bi bi-circle"></i><span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manage-category.index')}}">
                        <i class="bi bi-circle"></i><span>Show</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-product" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Product</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-product" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('manage-product.create')}}">
                        <i class="bi bi-circle"></i><span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manage-product.index')}}">
                        <i class="bi bi-circle"></i><span>Show</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>News</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Show</span>
                    </a>
                </li>


            </ul>
        </li>
    </ul>

</aside><!-- End Sidebar-->

