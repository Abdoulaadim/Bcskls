<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Ordernet</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">

        <li>
            <a href="visiteur">
                <i class='bx bxs-id-card'></i>
                <span class="links_name">Visiteur</span>
            </a>
            <span class="tooltip">Visiteur</span>
        </li>
        <li>
            <a href="centrant">
                <i class='bx bx-mail-send'></i>
                <span class="links_name">Courrier Entrant</span>
            </a>
            <span class="tooltip">Courrier Entrant</span>
        </li>
        <li>
            <a href="csortant">
                <i class='bx bx-mail-send'></i>
                <span class="links_name">Courrier Sortant</span>
            </a>
            <span class="tooltip">Courrier Sortant</span>
        </li>

        <li>
            <a href="fax">
                <i class='bx bx-pie-chart-alt-2'></i>
                <span class="links_name">Fax</span>
            </a>
            <span class="tooltip">Fax</span>
        </li>
        <li>
            <a href="telephone">
                <i class='bx bx-phone'></i>
                <span class="links_name">Télephone</span>
            </a>
            <span class="tooltip">Télephone</span>
        </li>
        @if( Auth::user()->role == "Admin" )
        <li>
            <a href="/menu">
                <i class='bx bxs-data'></i>
                <span class="links_name">Base de donnee</span>
            </a>
            <span class="tooltip">Base de donnee</span>
        </li>
        @endif


        <li>
            <a href="{{ route('profile.show') }}">
                <i class='bx bx-cog'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li class="profile">
            <div class="profile-details">

                <div class="name">Déconnecter</div>

            </div>
            <form method="POST" action="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                @csrf

                <a href="{{ route('logout') }}"> <i class='bx bx-log-out' id="log_out"></i></a>

            </form>







        </li>
    </ul>
</div>