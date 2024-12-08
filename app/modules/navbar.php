<?php
$userData = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
    <style>
        <?php require_once __DIR__ . '/styles/style.css'?>
    </style>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <?php $baseURL = 'http://localhost:63342/nutriPT'; ?>
                    <a href="<?php echo $baseURL; ?>/home">
                        <img src="/images/nutriPT-White-Transparent.png" alt="logo">
                    </a>
                </div>
                <ul class="nav-links" id="nav-links">
                    <li><a href="<?php echo $baseURL; ?>/home">Home</a></li>
                    <li><a href="<?php echo $baseURL; ?>/about">About</a></li>
                    <li><a href="<?php echo $baseURL; ?>/services">Services</a></li>
                    <li><a href="<?php echo $baseURL; ?>/contact">Contact</a></li>

                    <!-- Kullanıcı giriş yapmış mı kontrolü -->
                    <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']): ?>
                        <li><a href="/profile" class="li-btn">Profile</a></li>
                        <li><a href="/logout" class="li-btn">Logout</a></li>
                    <?php else: ?>
                        <li><a href="<?php echo $baseURL; ?>/login" class="btn btn-primary li-btn">Login</a></li>
                    <?php endif; ?>
                </ul>
                <div class="burger" id="burger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="nav-btn">
                    <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']): ?>
                        <div class="user-profile">
                            <div class="profile-info">
                                <img src="<?php echo htmlspecialchars($userData['profile_image'] ?? '/images/default-profile.png'); ?>" 
                                    alt="Profile Image" class="profile-image">
                                <span><?php echo htmlspecialchars($userData['name']) . ' ' . htmlspecialchars($userData['surname']); ?></span>
                                <span class="arrow">&#9660;</span>
                                <div class="dropdown-content">
                                    <a href="/settings">Settings</a>
                                    <a href="/profile">Profile</a>
                                    <a href="/logout">Logout</a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo $baseURL; ?>/login" class="btn btn-primary">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <script>
        const burger = document.getElementById('burger');
        const navLinks = document.getElementById('nav-links');

        burger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>


