<nav>
    <span><box-icon type='solid' name='cat' animation='tada-hover'></box-icon> Chat Peau De paille</span>
    <ul>
        <li><a href="support.php">Support</a></li>
        <li><a href="login.php"> <?php echo !empty($_SESSION) ? 'Se Déconnecter' : "S'identifier"?></a></li>
    </ul>
</nav>