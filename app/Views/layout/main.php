<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="container">
        <header style="background-color: #4285f4; color: white; padding: 20px;">
            <h1 style="margin: 0;">Portal Berita adelliarzz</h1>
        </header>
        
        <nav style="background-color: #333; padding: 10px;">
            <a href="<?= base_url('/'); ?>" style="color: white; margin-right: 15px; text-decoration: none;">Home</a>
            <a href="<?= base_url('/artikel'); ?>" style="color: white; margin-right: 15px; text-decoration: none;">Artikel</a>
            <a href="<?= base_url('/about'); ?>" style="color: white; margin-right: 15px; text-decoration: none;">About</a>
            <a href="<?= base_url('/contact'); ?>" style="color: white; margin-right: 15px; text-decoration: none;">Kontak</a>
            
            <?php if (session()->get('logged_in')): ?>
                <a href="<?= base_url('/admin/artikel'); ?>" style="color: #fbbc05; margin-right: 15px; text-decoration: none; font-weight: bold;">Dashboard</a>
                <a href="<?= base_url('/user/logout'); ?>" style="color: #ff4d4d; float: right; text-decoration: none; font-weight: bold;">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('/user/login'); ?>" style="color: #4285f4; float: right; text-decoration: none; font-weight: bold;">Login</a>
            <?php endif; ?>
        </nav>

        <section id="wrapper" style="display: flex; gap: 20px; padding: 20px; min-height: 400px;">
            <section id="main" style="flex: 3;">
                <?= $this->renderSection('content'); ?>
            </section>

            <aside id="sidebar" style="flex: 1; background: #fafafa; padding: 15px; border: 1px solid #ddd; min-width: 200px;">
                <?= view_cell('App\Cells\ArtikelTerkini::render'); ?>
            </aside>
        </section>

        <footer style="text-align: center; padding: 20px; border-top: 1px solid #ddd; margin-top: 20px;">
            <p>&copy; 2026 - adelliarzz (312410357)</p>
        </footer>
    </div>
</body>
</html>