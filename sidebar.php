<aside id="sidebar">
    <div class="d-flex">
        <a class="toggle-btn" href="#" id="sidebar-button">
            <i class="lni lni-grid-alt"></i>
        </a>
        <div class="sidebar-logo">
            <a href="home.php">ArcHive</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="home.php" class="sidebar-link">
                <i class="bi bi-house-door"></i> <!-- Home icon -->
                <span>Home</span>
            </a>
        </li>
        <?php 
            if (isset($_SESSION['loggedUserType']) && $_SESSION['loggedUserType'] == 'ADMIN') {
                include_once 'admin_tabs.php';
            }
        ?>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link" onclick="openTab(event, 'browseBooks', 'browseTab', 'booksPage')" id="browseTab">
                <i class="bi bi-collection"></i> <!-- Books icon -->
                <span>Browse Books</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="account.php" class="sidebar-link">
                <i class="bi bi-person"></i> <!-- Account icon -->
                <span>Account</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="#" id="logoutBtn" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>