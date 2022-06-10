<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="{{ Request::is('bills*') ? 'active' : '' }}">
    <a href="{{ route('bills.index') }}"><i class="fa fa-edit"></i><span>Bills</span></a>
</li>

