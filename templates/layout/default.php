<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\I18n\I18n;

$cakeDescription = 'Sistema de Gestión';
$currentLang = I18n::getLocale();
?>
<!DOCTYPE html>
<html lang="<?= h(substr($currentLang, 0, 2)) ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $this->fetch('title') ?: $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #6b7280;
            --success: #16a34a;
            --warning: #f59e0b;
            --danger: #dc2626;
            --info: #0ea5e9;
            --bg: #f4f7fb;
            --surface: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-text: #e2e8f0;
            --shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            --radius: 18px;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100%;
        }

        a {
            text-decoration: none;
        }

        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 270px;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            padding: 24px 18px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            box-shadow: var(--shadow);
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 10px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .brand-text h1 {
            margin: 0;
            font-size: 18px;
            color: white;
            font-weight: 800;
        }

        .brand-text p {
            margin: 3px 0 0;
            font-size: 12px;
            color: #94a3b8;
        }

        .menu-title {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #94a3b8;
            margin: 12px 10px 10px;
            font-weight: 700;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            color: var(--sidebar-text);
            font-weight: 600;
            transition: all .2s ease;
        }

        .nav-link-custom i {
            width: 18px;
            text-align: center;
        }

        .nav-link-custom:hover {
            background: var(--sidebar-hover);
            color: white;
            transform: translateX(2px);
        }

        .nav-link-danger {
            margin-top: auto;
            background: rgba(220, 38, 38, 0.15);
            color: #fecaca;
        }

        .nav-link-danger:hover {
            background: rgba(220, 38, 38, 0.25);
            color: white;
        }

        .main {
            flex: 1;
            margin-left: 270px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            padding: 18px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .topbar-title h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
            color: var(--text);
        }

        .topbar-title p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .top-badge {
            background: #eff6ff;
            color: var(--primary-dark);
            border: 1px solid #bfdbfe;
            padding: 10px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }

        .language-switcher {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 8px 12px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.05);
        }

        .language-switcher i {
            color: var(--primary);
            font-size: 15px;
        }

        .language-select {
            border: none;
            background: transparent;
            color: var(--text);
            font-weight: 600;
            font-size: 14px;
            outline: none;
            cursor: pointer;
        }

        .content-wrapper {
            padding: 28px;
            flex: 1;
        }

        .content-card {
            background: var(--surface);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            min-height: 200px;
            overflow: hidden;
        }

        .flash-messages {
            margin-bottom: 18px;
        }

        .message {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 10px;
            font-weight: 600;
            border: 1px solid transparent;
        }

        .message.success {
            background: #dcfce7;
            color: #166534;
            border-color: #bbf7d0;
        }

        .message.error {
            background: #fee2e2;
            color: #991b1b;
            border-color: #fecaca;
        }

        .message.warning {
            background: #fef3c7;
            color: #92400e;
            border-color: #fde68a;
        }

        .message.info {
            background: #e0f2fe;
            color: #075985;
            border-color: #bae6fd;
        }

        .footer {
            padding: 16px 28px 24px;
            color: var(--muted);
            font-size: 13px;
        }

        .mobile-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 12px;
            background: #e2e8f0;
            color: #0f172a;
            font-size: 18px;
            cursor: pointer;
            flex-shrink: 0;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .mobile-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .topbar {
                padding: 16px 18px;
            }

            .content-wrapper {
                padding: 18px;
            }

            .footer {
                padding: 12px 18px 20px;
            }

            .topbar-title h2 {
                font-size: 18px;
            }

            .topbar-title p,
            .top-badge {
                font-size: 12px;
            }
        }

        @media (max-width: 640px) {
            .topbar {
                flex-wrap: wrap;
                align-items: flex-start;
            }

            .topbar-left,
            .topbar-right {
                width: 100%;
            }

            .topbar-right {
                justify-content: flex-start;
            }

            .language-switcher {
                width: 100%;
                justify-content: space-between;
            }

            .top-badge {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="app-layout">
        <aside class="sidebar" id="sidebar">
            <div class="brand">
                <div class="brand-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="brand-text">
                    <h1>Sistema</h1>
                    <p>Panel de administración</p>
                </div>
            </div>

            <div class="menu-title">Menú principal</div>

            <nav class="nav-menu">
               
                <?= $this->Html->link(
                    '<i class="fas fa-users"></i><span>Usuarios</span>',
                    ['controller' => 'Users', 'action' => 'index'],
                    ['class' => 'nav-link-custom', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    '<i class="fas fa-tags"></i><span>Categorías</span>',
                    ['controller' => 'Categorias', 'action' => 'index'],
                    ['class' => 'nav-link-custom', 'escape' => false]
                ) ?>

                <?= $this->Html->link(
                    '<i class="fas fa-right-from-bracket"></i><span>Cerrar sesión</span>',
                    ['controller' => 'Users', 'action' => 'logout'],
                    ['class' => 'nav-link-custom nav-link-danger', 'escape' => false]
                ) ?>
            </nav>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="topbar-left">
                    <button class="mobile-toggle" id="mobileToggle" type="button">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="topbar-title">
                        <h2><?= $this->fetch('title') ?: 'Panel principal' ?></h2>
                        <p>Gestiona tu sistema de forma ordenada y profesional</p>
                    </div>
                </div>

                <div class="topbar-right">
                    <div class="language-switcher">
                        <i class="fas fa-language"></i>
                        <select
                            name="lang"
                            class="language-select"
                            onchange="window.location.href='<?= $this->Url->build(['controller' => 'Language', 'action' => 'switch']) ?>/' + this.value"
                        >
                            <option value="es_ES" <?= $currentLang === 'es_ES' ? 'selected' : '' ?>>Español</option>
                            <option value="en_US" <?= $currentLang === 'en_US' ? 'selected' : '' ?>>English</option>
                        </select>
                    </div>

                    <div class="top-badge">
                        <i class="fas fa-shield-halved"></i> Administración
                    </div>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="flash-messages">
                    <?= $this->Flash->render() ?>
                </div>

                <div class="content-card">
                    <?= $this->fetch('content') ?>
                </div>
            </div>

            <footer class="footer">
                © <?= date('Y') ?> - Sistema de Gestión
            </footer>
        </main>
    </div>

    <script>
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebar = document.getElementById('sidebar');

        if (mobileToggle && sidebar) {
            mobileToggle.addEventListener('click', function () {
                sidebar.classList.toggle('open');
            });

            document.addEventListener('click', function (e) {
                if (window.innerWidth <= 991) {
                    if (!sidebar.contains(e.target) && !mobileToggle.contains(e.target)) {
                        sidebar.classList.remove('open');
                    }
                }
            });
        }
    </script>
</body>
</html>	