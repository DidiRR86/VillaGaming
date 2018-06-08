
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Steam</a></li>
            <li><a href="#!">Origin</a></li>
            <li><a href="#!">Uplay</a></li>
            <li><a href="#!">Xbox</a></li>
            <li><a href="#!">PlayStation</a></li>
            <li><a href="#!">Nintendo</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
            <li><a href="#!">Accion</a></li>
            <li><a href="#!">Arcade</a></li>
            <li><a href="#!">Aventura</a></li>
            <li><a href="#!">Carreras</a></li>
            <li><a href="#!">Lucha</a></li>
            <li><a href="#!">Deporte</a></li>
            <li><a href="#!">Estrategia</a></li>
            <li><a href="#!">Indi</a></li>
            <li><a href="#!">Plataformas</a></li>
        </ul>
        <nav id="nav-bar" class="orange darken-2" style="width: 80%;margin: 0 auto;margin-top: 5%;">
            <div class="nav-wrapper">
                <ul class="left hide-on-med-and-down">
                    <!-- Dropdown Trigger -->

                    <li><a class="dropdown-trigger" data-target="dropdown1">
                            Plataforma<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li> <a class="dropdown-trigger" data-target="dropdown2">
                            Genero<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="products.php">
                            Productos</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <?php
                    if (isset($_SESSION['loginUsu'])) {
                        echo "<li><a href='userproperties.php'>" 
                        .$_SESSION['loginUsu']."</a></li>";
                        ?><li><a href='options.php?option=close' style="height: 64px;">
                                <img src="img/buttons/salida.png" style="margin-top: 55%;"></a><li>
                            <li><a href='vistacarro.php' style="height: 64px;">
                                <img src="img/buttons/carro.png" style="margin-top: 55%;"></a></li>
                            <?php
                        } else {
                            ?><li><a href='login.php'>Login</a></li>
                        <li><a href="register.php">Resgistrarse</a></li>
                        <?php
                    }
                    ?>  
                </ul>
                <ul class="center hide-on-med-and-down" style="margin-left: 40%;">
                    <!-- Dropdown Trigger -->
                    <li><input type="search" style="background-color: white;
                               border-radius: 20px;
                               width: 125%;" placeholder="Buscar" /></li>
                </ul>
            </div>
        </nav>

