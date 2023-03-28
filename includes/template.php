<header>
            <a class="logo" href="listaemprestimos.php">
                <i class="fas fa-clipboard-list iconlogo"></i>
                <span class="iconlogo">Sce</span><br>
                <span class="textlogo">Sistema de Controle de Equipamentos</span>
            </a>
            <a class="minhaconta" href="cadastrousuario.php?id=<?php echo $_SESSION['id'];?>"><?php echo $_SESSION['login'] . "<br>";?>Minha conta</a>
        </header>
                <input type="checkbox" id="check" checked>
        <nav>
            <label for="check" id="menu" class="fas fa-bars"></label>
            <a href="listaemprestimos.php"><i class="fas fa-home"></i><span>Home</span></a>            
            <a href="listaequipamentos.php"><i class="fas fa-clipboard-list"></i><span>Equipamentos</span></a>
            <a href="listausuarios.php"><i class="fas fa-users"></i><span>Cadastrar</span></a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
        </nav>
        <footer>
            <p>Direitos Reservados.</p>
        </footer>