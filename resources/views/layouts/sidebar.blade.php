<div class="sidebar">
    <a href="/" style="color: red" class="side{{ request()->is('/') ? 'active' : '' }}"><h1>Pinterus</h1></a>
    @if (Auth::user()->level == "admin")
    <a href="/admin" class="side{{ request()->is('admin') ? 'active' : '' }}">Dashboard Admin</a>
    <a href="/userdata" class="side{{ request()->is('userdata') ? 'active' : '' }}">User Data</a>
    <a href="/registeradmin" class="side{{ request()->is('registeradmin') ? 'active' : '' }}">Register Admin</a>
        
    @endif
    <a href="/profile/{{ Auth::user()->userid }}" class="side{{ request()->is('profile/*') ? 'active' : '' }}">Profile</a>
    <a href="/galeriku" class="side{{ request()->is('galeriku') ? 'active' : '' }}">Galeriku</a>
    <a href="/mylike" class="side{{ request()->is('mylike') ? 'active' : '' }}">Likes</a>
    <a href="/upload" class="side{{ request()->is('upload') ? 'active' : '' }}">Upload Gambar</a>
    <span class="close-btn" onclick="closeSidebar()">&times;</span>
</div>

<button class="btn" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>

<script>
    function toggleSidebar() {
        var sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('show-sidebar');
    }
    
    function closeSidebar() {
        var sidebar = document.querySelector('.sidebar');
        sidebar.classList.remove('show-sidebar');
    }
</script>