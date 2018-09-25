<!-- officer and above -->
@if (Auth::user()->access_power == 1000 || Auth::user()->access_power >= 5000)
    <!-- User & Above -->
    <li class="navigation-header"><span>Module</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(1) == 'dashboard') class="active" @endif><a href="{{ url('') }}/dashboard"><i class="icon-home4"></i>
            <span>Inbox</span></a></li>
@endif

{{--jwatan kuasa--}}
{{--<li class="navigation-header"><span>Jawatan Kuasa Pengesahan</span> <i class="icon-menu" title="Main pages"></i></li>--}}
{{--<li @if (Request::segment(1) == 'board') class="active" @endif><a href="/board/type"><i class="icon-checkmark"></i> <span>Pengesahan</span></a>--}}
{{--<ul>--}}
{{--<li><a href="/board/type">Buat Pengesahan</a></li>--}}
{{--<li><a href="/board/list-done">Selesai Pengesahan</a></li>--}}
{{--<li><a href="/board/list-tolak">Ditolak Pengesahan</a></li>--}}
{{--<li><a href="/board/list-kiv">KIV Pengesahan</a></li>--}}
{{--</ul>--}}
{{--</li>--}}


{{--<li class="navigation-header"><span>Tarik Data</span> <i class="icon-menu" title="Main pages"></i></li>--}}
{{--<li @if (Request::segment(1) == 'board') class="active" @endif><a href="/board/type"><i class="icon-checkmark"></i> <span>eSPKM</span></a>--}}
{{--<ul>--}}
{{--<li><a href="/data">Data SKM</a></li>--}}
{{--</ul>--}}
{{--</li>--}}

{{--admin officer--}}
@if (Auth::user()->access_power >= 5000)
    <li class="navigation-header"><span>Pegawai Agihan</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(1) == 'certificate') class="active" @endif><a href="{{ url('') }}/certificate/list"><i
                    class="icon-add-to-list"></i> <span>Agihan Tugasan</span></a>
        <ul>
            <li><a href="{{ url('') }}/certificate/type">Agihan Tugasan</a></li>
            <li><a href="{{ url('') }}/certificate/done-batch">Selesai Agihan Tugasan</a></li>
        </ul>
    </li>
@endif
{{--  DONE --}}

{{--accredited center--}}
@if (Auth::user()->access_power == 1000)
    <li class="navigation-header"><span>Pegawai Pencetak</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(1) == 'print') class="active" @endif><a href="{{ url('') }}/print/list"><i class="icon-printer2"></i>
            <span>Cetak</span></a>
        <ul>
            <li><a href="{{ url('') }}/print">Cetak Sijil</a></li>
            <li><a href="{{ url('') }}/print/list-done">Selesai Cetak Sijil</a></li>
        </ul>
    </li>
@endif
{{--  DONE --}}
{{--payment--}}
@if (Auth::user()->access_power >= 1000)
    <li class="navigation-header"><span>Pegawai</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(1) == 'search') class="active" @endif><a href="{{ url('') }}/search"><i class="icon-search4"></i>
            <span>Carian</span></a>
        <ul>
            <li><a href="{{ url('') }}/search">Carian Baru</a></li>
        </ul>
    </li> {{--  DONE --}}
    {{--<li @if (Request::segment(1) == 'payment') class="active" @endif><a href="/payment"><i class="icon-coin-dollar"></i>--}}
            {{--<span>ePayment</span></a>--}}
        {{--<ul>--}}
            {{--<li><a href="/search">Kemaskini ePayment</a></li>--}}
            {{--<li><a href="/payment/list">Senarai Bayaran</a></li>--}}
        {{--</ul>--}}
    {{--</li> --}}{{--  DONE --}}
    <li @if (Request::segment(1) == 'status') class="active" @endif><a href="/status"><i class="icon-grid"></i> <span>Status</span></a>
        <ul>
            <li><a href="{{ url('') }}/search">Semak Status</a></li>
        </ul>
    </li> {{--  DONE --}}
    <li @if (Request::segment(1) == 'replacement') class="active" @endif><a href="{{ url('') }}/replacement"><i
                    class="icon-add-to-list"></i> <span>Penggantian</span></a>
        <ul>
            <li><a href="{{ url('') }}/search">Penggantian Baru</a></li>
            <li><a href="{{ url('') }}/replacement">Senarai Penggantian</a></li>
        </ul>
    </li> {{--  DONE --}}
    <li @if (Request::segment(1) == 'post') class="active" @endif><a href="{{ url('') }}/post"><i class="icon-mailbox"></i> <span>Pembungkusan</span></a>
        <ul>
            <li><a href="{{ url('') }}/search">Pembungkusan Baru</a></li>
            <li><a href="{{ url('') }}/post">Senarai Selesai</a></li>
            <li><a href="{{ url('') }}/post/company">Senarai Syarikat Luar</a></li>
        </ul>
    </li> {{--  DONE --}}
@endif

@if (Auth::user()->access_power >= 1000)
    <li class="navigation-header"><span>Laporan-Laporan</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(1) == 'report') class="active" @endif><a href="{{ url('') }}/report"><i class="icon-statistics"></i>
            <span>Laporan</span></a>
        <ul>
            <li><a href="{{ url('') }}/report">Senarai Laporan</a></li>
        </ul>
    </li> {{--  DONE --}}
@endif

{{--company--}}
@if (Auth::user()->access_power == 500 || Auth::user()->access_power >= 5000 )
    <li class="navigation-header"><span>Pencetak Luar</span> <i class="icon-menu" title="Main pages"></i></li>

    <li @if (Request::segment(1) == 'company-download') class="active" @endif>
        <a href="{{ url('') }}/company-download"><i class="icon-download7"></i> <span>Muat Turun</span></a>
        <ul>
            <li><a href="{{ url('') }}/company-download">Muat Turun Senarai</a></li>
        </ul>
    </li>
    <li @if (Request::segment(1) == 'company-print') class="active" @endif>
        <a href="{{ url('') }}/company-print/search"><i class="icon-printer4"></i> <span>Percetakan</span></a>
        <ul>
            <li><a href="{{ url('') }}/company-print/search">Cetakan Baru</a></li>
        </ul>
        <ul>
            <li><a href="{{ url('') }}/company-print/search-edit">Edit Sijil</a></li>
        </ul>
    </li>
    <li @if (Request::segment(1) == 'company-search') class="active" @endif>
        <a href="{{ url('') }}/company-search/post"><i class="icon-mail-read"></i> <span>Pengeposan</span></a>
        <ul>
            <li><a href="{{ url('') }}/company-search/post">Pos Baru</a></li>
            <li><a href="{{ url('') }}/company-search/list">Selesai Pengeposan</a></li>
        </ul>
    </li>
    <li @if (Request::segment(1) == 'company-report') class="active" @endif>
        <a href="{{ url('') }}/company-report"><i class="icon-stack-check"></i> <span>Laporan</span></a>
        <ul>
            <li><a href="{{ url('') }}/company-report">Papar Laporan</a></li>
        </ul>
    </li>
@endif

@if (Auth::user()->access_power >= 2000)
    {{--jwatan kuasa--}}
    <li class="navigation-header"><span>Pengesahan Bayaran</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(1) == 'finance') class="active" @endif><a href="/finance/confirm">
        <i class="icon-checkmark"></i> <span>Pengesahan Bayaran</span></a>
        <ul>
            <li><a href="{{ url('') }}/finance/confirm">Pengesahan Bayaran</a></li>
            <li><a href="{{ url('') }}/finance/list">Selesai Disahkan Bayaran</a></li>
        </ul>
    </li>
@endif


{{-- Super Admin Only --}}
@if (Auth::user()->role == 'super_admin')
    <li class="navigation-header"><span>SUPER ADMIN</span> <i class="icon-menu" title="Main pages"></i></li>
    <li @if (Request::segment(2) == 'user') class="active" @endif>
        <a href="#"><i class="icon-users"></i> <span>User Management</span></a>
        <ul>
            <li><a href="{{ url('') }}/user/create">Create New User</a></li>
            <li><a href="{{ url('') }}/user">All Users</a></li>
        </ul>
    </li>
    <li @if (Request::segment(2) == 'audit-trail') class="active" @endif><a href="{{ url('') }}/audit-trail">
            <i class="icon-list"></i> <span>Audit Trail</span></a></li>
    <li @if (Request::segment(2) == 'lookups') class="active" @endif>
        <a href="#"><i class="icon-hammer-wrench"></i> <span>Lookups Management</span></a>
        <ul>
            <li><a href="{{ url('') }}/lookups/role">Role</a></li>
        </ul>

@endif
{{-- End Super Admin--}}