<div class="login-card theme-aware">
    <div class="login-header">
        <!-- Botón modo noche -->
        <button type="button" class="theme-toggle" id="themeToggle" aria-label="Cambiar a modo oscuro">
            <i class="fas fa-moon"></i>
        </button>

        <div class="login-icon" aria-hidden="true">
            <i class="fas fa-user-circle"></i>
        </div>
        <h2>Iniciar Sesión</h2>
        <p>Accede a tu cuenta para continuar</p>
    </div>

    <div class="login-body">
        <!-- Mensajes flash (si existen) -->
        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Users', 'action' => 'login'],
            'class' => 'login-form',
            'novalidate' => true
        ]) ?>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <div class="field-wrapper">
                <span class="field-icon" aria-hidden="true">
                    <i class="fas fa-envelope"></i>
                </span>
                <?= $this->Form->email('correo', [
                    'id' => 'correo',
                    'label' => false,
                    'class' => 'form-control custom-input with-left-icon',
                    'placeholder' => 'tucorreo@ejemplo.com',
                    'required' => true,
                    'autofocus' => true,
                    'autocomplete' => 'email',
                    'spellcheck' => false,
                    'templates' => ['inputContainer' => '{{content}}']
                ]) ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="password-field" class="form-label">Contraseña</label>
            <div class="field-wrapper">
                <span class="field-icon" aria-hidden="true">
                    <i class="fas fa-lock"></i>
                </span>
                <?= $this->Form->password('password', [
                    'id' => 'password-field',
                    'label' => false,
                    'class' => 'form-control custom-input with-both-icons',
                    'placeholder' => '••••••••',
                    'required' => true,
                    'autocomplete' => 'current-password',
                    'templates' => ['inputContainer' => '{{content}}']
                ]) ?>
                <button type="button" class="toggle-password" id="togglePassword" aria-label="Mostrar contraseña" aria-pressed="false">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="remember-row">
            <label class="remember-me">
                <?= $this->Form->checkbox('remember', ['hiddenField' => false, 'value' => 1]) ?>
                <span>Recordarme</span>
            </label>
        </div>

        <div class="d-grid mt-3">
            <?= $this->Form->button('<i class="fas fa-sign-in-alt" aria-hidden="true"></i> Iniciar Sesión', [
                'type' => 'submit',
                'class' => 'btn-login',
                'escapeTitle' => false
            ]) ?>
        </div>

        <?= $this->Form->end() ?>

        <div class="register-link">
            ¿No tienes cuenta?
            <?= $this->Html->link('Regístrate aquí', ['action' => 'add'], ['class' => 'register-link-btn']) ?>
        </div>
    </div>
</div>

<style>
    /* ===== VARIABLES CSS (claro por defecto) ===== */
    :root {
        --login-primary: #667eea;
        --login-primary-dark: #5a67d8;
        --login-bg-card: #ffffff;
        --login-text-primary: #1a202c;
        --login-text-secondary: #4a5568;
        --login-text-muted: #6c757d;
        --login-input-bg: #ffffff;
        --login-input-border: #e2e8f0;
        --login-input-focus-ring: rgba(102, 126, 234, 0.2);
        --login-icon-color: #7b8794;
        --login-header-gradient-start: #667eea;
        --login-header-gradient-end: #764ba2;
        --login-header-text: white;
        --login-header-text-muted: rgba(255,255,255,0.85);
        --transition-default: all 0.2s ease;
    }

    /* ===== MODO OSCURO ===== */
    body.dark-mode {
        --login-bg-card: #1e293b;
        --login-text-primary: #f1f5f9;
        --login-text-secondary: #cbd5e1;
        --login-text-muted: #94a3b8;
        --login-input-bg: #334155;
        --login-input-border: #475569;
        --login-input-focus-ring: rgba(102, 126, 234, 0.4);
        --login-icon-color: #94a3b8;
        --login-header-gradient-start: #1e1b4b;
        --login-header-gradient-end: #2e1065;
        --login-header-text: #e2e8f0;
        --login-header-text-muted: #cbd5e1;
    }

    /* Estilos base */
    .login-card {
        max-width: 460px;
        margin: 0 auto;
        border: none;
        border-radius: 28px;
        background: var(--login-bg-card);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
        transition: var(--transition-default);
    }

    body.dark-mode .login-card {
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.4);
    }

    .login-header {
        text-align: center;
        padding: 2.2rem 1.5rem 1.8rem;
        background: linear-gradient(135deg, var(--login-header-gradient-start) 0%, var(--login-header-gradient-end) 100%);
        border-radius: 28px 28px 0 0;
        color: var(--login-header-text);
        position: relative;
    }

    /* Botón modo noche */
    .theme-toggle {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(255,255,255,0.2);
        border: none;
        border-radius: 40px;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: white;
        font-size: 1.1rem;
        transition: var(--transition-default);
        backdrop-filter: blur(4px);
    }

    .theme-toggle:hover {
        background: rgba(255,255,255,0.35);
        transform: scale(1.05);
    }

    .login-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 16px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        border: 2px solid rgba(255, 255, 255, 0.35);
    }

    .login-header h2 {
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.3px;
        color: inherit;
    }

    .login-header p {
        margin: 8px 0 0;
        font-size: 0.95rem;
        color: var(--login-header-text-muted);
    }

    .login-body {
        padding: 2rem 1.8rem 1.8rem;
        background: var(--login-bg-card);
        border-radius: 0 0 28px 28px;
    }

    /* Campos */
    .field-wrapper {
        position: relative;
    }

    .field-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--login-icon-color);
        z-index: 2;
        pointer-events: none;
        font-size: 1rem;
    }

    .custom-input {
        height: 52px;
        border-radius: 16px;
        font-size: 0.95rem;
        border: 1.5px solid var(--login-input-border);
        background-color: var(--login-input-bg);
        color: var(--login-text-primary);
        transition: var(--transition-default);
        width: 100%;
        padding: 0 16px;
    }

    .custom-input:focus {
        border-color: var(--login-primary);
        box-shadow: 0 0 0 3px var(--login-input-focus-ring);
        outline: none;
    }

    .with-left-icon {
        padding-left: 44px;
    }

    .with-both-icons {
        padding-left: 44px;
        padding-right: 48px;
    }

    /* Botón mostrar contraseña */
    .toggle-password {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: var(--login-icon-color);
        width: 28px;
        height: 28px;
        cursor: pointer;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .toggle-password:hover {
        color: var(--login-primary);
        background-color: rgba(102, 126, 234, 0.1);
    }

    /* Checkbox */
    .remember-row {
        display: flex;
        justify-content: center;
        margin: 1rem 0 0.5rem;
    }

    .remember-me {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
        color: var(--login-text-secondary);
        cursor: pointer;
    }

    .remember-me input {
        width: 18px;
        height: 18px;
        accent-color: var(--login-primary);
        cursor: pointer;
    }

    /* Botón login */
    .btn-login {
        width: 100%;
        min-height: 52px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 1rem;
        background: linear-gradient(90deg, var(--login-primary), var(--login-primary-dark));
        border: none;
        color: white;
        transition: var(--transition-default);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(102, 126, 234, 0.4);
    }

    /* Enlace registro */
    .register-link {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: var(--login-text-muted);
    }

    .register-link a {
        text-decoration: none;
        font-weight: 600;
        color: var(--login-primary);
        transition: var(--transition-default);
        margin-left: 4px;
    }

    .register-link a:hover {
        text-decoration: underline;
        color: var(--login-primary-dark);
    }

    /* Mensajes flash */
    .alert {
        border-radius: 14px;
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1.5rem;
        background: var(--login-input-bg);
        border: 1px solid var(--login-input-border);
        color: var(--login-text-primary);
    }

    /* Responsive */
    @media (max-width: 520px) {
        .login-card {
            margin: 1rem;
            max-width: calc(100% - 2rem);
        }
        .login-body {
            padding: 1.5rem;
        }
        .custom-input {
            height: 48px;
        }
        .btn-login {
            min-height: 48px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle mostrar/ocultar contraseña
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password-field');

        if (togglePassword && passwordField) {
            const updateToggleButton = () => {
                const isVisible = passwordField.type === 'text';
                const icon = togglePassword.querySelector('i');
                if (isVisible) {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                    togglePassword.setAttribute('aria-label', 'Ocultar contraseña');
                    togglePassword.setAttribute('aria-pressed', 'true');
                } else {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                    togglePassword.setAttribute('aria-label', 'Mostrar contraseña');
                    togglePassword.setAttribute('aria-pressed', 'false');
                }
            };

            togglePassword.addEventListener('click', () => {
                passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                updateToggleButton();
                passwordField.focus();
            });
        }

        // Modo noche
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = themeToggle ? themeToggle.querySelector('i') : null;

        function setTheme(theme) {
            if (theme === 'dark') {
                document.body.classList.add('dark-mode');
                if (themeIcon) {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                }
                if (themeToggle) themeToggle.setAttribute('aria-label', 'Cambiar a modo claro');
                localStorage.setItem('theme', 'dark');
            } else {
                document.body.classList.remove('dark-mode');
                if (themeIcon) {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                }
                if (themeToggle) themeToggle.setAttribute('aria-label', 'Cambiar a modo oscuro');
                localStorage.setItem('theme', 'light');
            }
        }

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            setTheme(savedTheme);
        } else {
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            setTheme(prefersDark ? 'dark' : 'light');
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const isDark = document.body.classList.contains('dark-mode');
                setTheme(isDark ? 'light' : 'dark');
            });
        }

        // Escuchar cambios del sistema si no hay preferencia guardada
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem('theme')) {
                setTheme(e.matches ? 'dark' : 'light');
            }
        });
    });
</script>