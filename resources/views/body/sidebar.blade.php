<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Currency Converter</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('currency-converter') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Converter</span>
                </a>
            </li>
            <li>
                <a href="{{ route('converted-currency') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Converted Currency</span>
                </a>
            </li>
            <li>
                <a href="{{ route('popular-currency') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Popular Currency</span>
                </a>
            </li>

            <li>
                <a href="{{ route('total-converted') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Total Converted In USD</span>
                </a>
            </li>

            <li>
                <a href="{{ route('conversion-request') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Total Conversion Requests made</span>
                </a>
            </li>

            <li class="header nav-small-cap">EXTRA</li>



            <li>
                <a href="auth_login.html">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>