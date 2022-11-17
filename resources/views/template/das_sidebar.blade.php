
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
            <img src="{{asset('arsha/assets')}}/img/logo.png " class="img-fluid animated logo me-auto" width="120" height="120">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @php
        $hasGroup=[];
        $linkActive=request()->segment(1)==""?"/":'/'.request()->segment(1);
        $groupActive="";
        $notif=getNotifKeluhan();
        @endphp
        @foreach (session("role_menus")->menus->sortBy("id") as $item)
        @if ($item->group_key==null)
        <li class="menu-item {{$linkActive==$item->link?'active':''}}">
            <a href="{{$item->link}}" class="menu-link">
                <i class="menu-icon tf-icons bx {{$item->icon}}"></i>
                <div data-i18n="{{$item->key}}" class="d-flex">{{$item->name}}
                    @if($item->key=="data_pesan"||$item->key=="data_keluhan"||$item->key=="massage")
                    @if($notif[$item->key])
                     <div style="width: 8px;height:8px;border-radius:100%;background-color:red"></div>
                     @endif
                   @endif

                </div>
            </a>
        </li>
        @else
        @if (!in_array($item->group_key,$hasGroup))

        @foreach (session("role_menus")->menus as $sub)
            @if ($sub->group_key!=$item->group_key)@continue @endif
            @if($sub->link==$linkActive)
            @php
                $groupActive=$sub->group_key;
                break;
            @endphp
            @endif
        @endforeach
        <li class="menu-item {{$groupActive==$item->group_key?'active open':''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx {{$item->icon}}"></i>
                <div data-i18n="{{$item->group_key}}">{{$item->group_name}}</div>
            </a>
            <ul class="menu-sub">
                @foreach (session("role_menus")->menus as $sub)
                @if($sub->group_key!=$item->group_key) @continue; @endif
                <li class="menu-item {{$linkActive==$sub->link?'active':''}}">
                    <a href="{{$sub->link}}" class="menu-link">
                        <div data-i18n="{{$sub->name}}">{{$sub->name}}</div>
                    </a>
                </li>
                @endforeach

            </ul>
        </li>
        @php
        $hasGroup[]=$item->group_key;
        @endphp
        @endif
        @endif
        @endforeach


        <!-- Layouts -->


        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li> --}}

    </ul>
</aside>
