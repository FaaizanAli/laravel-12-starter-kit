    <aside class="menu-bar menu-sticky">
    <div class="menu-items">
        <div class="menu-header hidden">
            <a href="#" class="flex items-center mx-8 mt-8">
                <span class="avatar w-16 h-16"><img src="{{auth()->user()->image}}" ></span>
                <div class="ltr:ml-4 rtl:mr-4 ltr:text-left rtl:text-right text-gray-700 dark:text-gray-500">
                    <h5>{{auth()->user()->name}}</h5>
                    <p class="mt-2 uppercase">{{auth()->user()->role}}</p>
                </div>
            </a>
            <hr class="mx-8 my-4">
        </div>
        @if(auth()->user()->role == 'admin')
            <a href="{{route('admin_dashboard')}}" class="link" data-toggle="tooltip-menu" data-tippy-content="Dashboard">
                <span class="icon la la-laptop"></span>
                <span class="title">Dashboard</span>
            </a>

            <a href="{{route('admin_settings')}}" class="link" data-toggle="tooltip-menu" data-tippy-content="Setting">
                <span class="icon la la-cog"></span>
                <span class="title">Setting</span>
            </a>
        @endif

    </div>


</aside>
