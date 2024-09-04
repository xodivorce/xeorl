<link rel="stylesheet" href="assets/css/_header.css">
<header>
<div class="header-container">
    <div class="logo">
        <img src="assets/images/url.png" alt="Xeorl Logo" class="logo-img">
        <span>Xeorl</span>
        <span class="version-number">3.2.0</span>
    </div>
    <label class="burger" for="burger">
      <input type="checkbox" id="burger">
      <span></span>
      <span></span>
      <span></span>
    </label> <!-- Hamburger Menu -->
    <nav>
        <ul>
            <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active disabled' : ''; ?>">Home</a></li>
            <li><a href="monetization.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'monetization.php' ? 'active disabled' : ''; ?>">Monetization</a></li>
            <li><a href="pricing.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'pricing.php' ? 'active disabled' : ''; ?>">Pricing</a></li>
            <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active disabled' : ''; ?>">Contact</a></li>
        </ul>
    </nav>
</div>
</header>
