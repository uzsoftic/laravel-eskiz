<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('eskizsms.dashboard') }}" style="font-weight: bolder;">Laravel Eskiz SMS</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ route('eskizsms.dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="SMS Sender">
                <a class="nav-link" href="{{ route('eskizsms.sender') }}">
                    <i class="fa fa-fw fa-comment"></i>
                    <span class="nav-link-text">SMS Sender</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="SMS Listing">
                <a class="nav-link" href="{{ route('eskizsms.listing') }}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">SMS Listing</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuration">
                <a class="nav-link" href="{{ route('eskizsms.config') }}">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Configuration</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Back to main">
                <a class="nav-link" href="/">
                    <i class="fa fa-fw fa-sign-out"></i>
                    <span class="nav-link-text">Back to main</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
