<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li> --}}
                @can('content_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/content-categories*', 'admin/content-tags*', 'admin/content-pages*', 'admin/advertisements*', 'admin/outlets*', 'admin/sections*', 'admin/journeys*', 'admin/join-us-pages*', 'admin/services*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/content-categories*', 'admin/content-tags*', 'admin/content-pages*', 'admin/advertisements*', 'admin/outlets*', 'admin/sections*', 'admin/journeys*', 'admin/join-us-pages*', 'admin/services*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-book">

                            </i>
                            <p>
                                {{ trans('cruds.contentManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- @can('content_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-categories.index") }}" class="nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-folder">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-tags.index") }}" class="nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}
                            {{-- @can('content_page_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-pages.index") }}" class="nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('advertisement_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.advertisements.index') }}"
                                        class="nav-link {{ request()->is('admin/advertisements') || request()->is('admin/advertisements/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-bullhorn">

                                        </i>
                                        <p>
                                            {{ trans('cruds.advertisement.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('join_us_page_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.join-us-pages.index') }}"
                                        class="nav-link {{ request()->is('admin/join-us-pages') || request()->is('admin/join-us-pages/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-child">

                                        </i>
                                        <p>
                                            {{ trans('cruds.joinUsPage.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('outlet_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.outlets.index') }}"
                                        class="nav-link {{ request()->is('admin/outlets') || request()->is('admin/outlets/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.outlet.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('admin.sections.index') }}"
                                    class="nav-link {{ request()->is('admin/sections') || request()->is('admin/sections/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-align-justify">

                                    </i>
                                    <p>
                                        {{ trans('cruds.section.title') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.journeys.index') }}"
                                    class="nav-link {{ request()->is('admin/journeys') || request()->is('admin/journeys/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-image">

                                    </i>
                                    <p>
                                        {{ trans('cruds.journey.title') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.services.index') }}"
                                    class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-lightbulb">

                                    </i>
                                    <p>
                                        {{ trans('cruds.service.title') }}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('menu_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/product-categories*', 'admin/product-tags*', 'admin/products*', 'admin/ingredient-categories*', 'admin/ingredient*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/product-categories*', 'admin/product-tags*', 'admin/products*', 'admin/ingredient-categories*', 'admin/ingredient*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-shopping-cart">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.ingredients.index') }}"
                                        class="nav-link {{ request()->is('admin/ingredients') || request()->is('admin/ingredients/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-seedling">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ingredient.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}"
                                        class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-utensils">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('ingredient_category_access') --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.ingredient-categories.index') }}"
                                    class="nav-link {{ request()->is('admin/ingredient-categories') || request()->is('admin/ingredient-categories/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-dot-circle">

                                    </i>
                                    <p>
                                        {{ trans('cruds.ingredientCategory.title') }}
                                    </p>
                                </a>
                            </li>
                            {{-- @endcan --}}
                            @can('product_category_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.product-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/product-categories') || request()->is('admin/product-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-dot-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is('admin/permissions*') ? 'active' : '' }} {{ request()->is('admin/roles*') ? 'active' : '' }} {{ request()->is('admin/users*') ? 'active' : '' }}"
                            href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}"
                        class="nav-link {{ request()->is('admin/settings') || request()->is('admin/settings/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-cog">

                        </i>
                        <p>
                            {{ trans('cruds.setting.title') }}
                        </p>
                    </a>
                </li>
                @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
