@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <center>  <img src="{{asset('assets/Lambang_kabupaten_cilacap.jpg')}}" alt="" width="50" hight="50" ></center>
        {{-- <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            
        </div> --}}
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                {{-- <img class="d-inline-block" width="32px" height="30.61px" src="{{asset('asset/Lambang_kabupaten_cilacap.jpg')}}" alt=""> --}}
            </a>
        </div>

        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            @if (auth()->user()->role_id == 1)
            <li class="menu-header">{{ $link->text }}</li>
            @else
            <li class="menu-header">Dashboard</li>
            @endif
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
            <li class="{{ Request::routeIs('data.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('data.index') }}"><i class="fas fa-user"></i><span>Data Pemeliharaan</span></a>
            </li>
            @else
                @if (auth()->user()->role_id ==0)
                    @foreach ($link->href as $section)
                        @php
                        $routes = collect($section->section_list)->map(function ($child) {
                            return Request::routeIs($child->href);
                        })->toArray();

                        $is_active = in_array(true, $routes);
                        @endphp

                        <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i> <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            @endif
        </ul>
        @endforeach
    </aside>
</div>
