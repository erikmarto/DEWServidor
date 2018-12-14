<nav id="searchbar" class="navbar navbar-light bg-light">
    <form class="form-inline" method="POST" action="lookup/search">
        <div class="input-group">
            <div class="input-group-prepend">
                <select class="form-control searchbar-selector bg-darkgreen" name="search[type]">
                    <option class="bg-darkgreen" value="entradas">Entradas</option>
                    <option class="bg-darkgreen" value="blog">Blogs</option>
                    <option class="bg-darkgreen" value="usuarios">Usuarios</option>
                </select>
            </div>
            <input type="text" class="form-control searchbar-bar" placeholder="Search">
        </div>
    </form>
</nav>    