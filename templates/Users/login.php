<div class="login-card">
    <div class="login-header">
        <div class="login-icon" aria-hidden="true">
            <i class="fas fa-user-circle"></i>
        </div>
        <h3><?= __('Iniciar Sesión') ?></h3>
        <p><?= __('Accede a tu cuenta para continuar') ?></p>
    </div>

    <div class="login-body">
        <?= $this->Flash->render() ?>

        <?= $this->Form->create(null, [
            'url' => ['controller' => 'Users', 'action' => 'login'],
            'class' => 'login-form',
            'novalidate' => true
        ]) ?>

        <div class="mb-3">
            <label for="correo" class="form-label"><?= __('Correo Electrónico') ?></label>
            <div class="field-wrapper">
                <span class="field-icon" aria-hidden="true">
                    <i class="fas fa-envelope"></i>
                </span>
                <?= $this->Form->email('correo', [
                    'id' => 'correo',
                    'label' => false,
                    'class' => 'form-control custom-input with-left-icon',
                    'placeholder' => __('tucorreo@ejemplo.com'),
                    'required' => true,
                    'autofocus' => true,
                    'autocomplete' => 'email',
                    'spellcheck' => false,
                    'templates' => ['inputContainer' => '{{content}}']
                ]) ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="password-field" class="form-label"><?= __('Contraseña') ?></label>
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
                <button type="button" class="toggle-password" id="togglePassword" aria-label="<?= __('Mostrar contraseña') ?>" aria-pressed="false">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="remember-row">
            <label class="remember-me">
                <?= $this->Form->checkbox('remember', ['hiddenField' => false, 'value' => 1]) ?>
                <span><?= __('Recordarme') ?></span>
            </label>
        </div>

        <div class="d-grid mt-3">
            <?= $this->Form->button(
                '<i class="fas fa-sign-in-alt" aria-hidden="true"></i> ' . __('Iniciar Sesión'),
                [
                    'type' => 'submit',
                    'class' => 'btn-login',
                    'escapeTitle' => false
                ]
            ) ?>
        </div>

        <?= $this->Form->end() ?>

        <div class="register-link">
            <?= __('¿No tienes cuenta?') ?>
            <?= $this->Html->link(__('Regístrate aquí'), ['action' => 'add'], ['class' => 'register-link-btn']) ?>
        </div>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .login-card {
        max-width: 460px;
        margin: 40px auto;
        border: 1px solid #e2e8f0;
        border-radius: 28px;
        background: #ffffff;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .login-header {
        text-align: center;
        padding: 2.2rem 1.5rem 1.8rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .login-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 16px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 38px;
        border: 2px solid rgba(255, 255, 255, 0.35);
    }

    .login-header h3 {
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
    }

    .login-header p {
        margin: 8px 0 0;
        font-size: 0.95rem;
        color: rgba(255,255,255,0.85);
    }

    .login-body {
        padding: 2rem 1.8rem 1.8rem;
        background: #ffffff;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #334155;
        font-size: 14px;
    }

    .field-wrapper {
        position: relative;
    }

    .field-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #7b8794;
        z-index: 2;
        pointer-events: none;
        font-size: 1rem;
    }

    .custom-input {
        height: 52px;
        border-radius: 16px;
        font-size: 0.95rem;
        border: 1.5px solid #e2e8f0;
        background-color: #ffffff;
        color: #1a202c;
        width: 100%;
        padding: 0 16px;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .custom-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        outline: none;
    }

    .with-left-icon {
        padding-left: 44px;
    }

    .with-both-icons {
        padding-left: 44px;
        padding-right: 48px;
    }

    .toggle-password {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #7b8794;
        padding: 0;
        width: 28px;
        height: 28px;
        cursor: pointer;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .toggle-password:hover {
        color: #667eea;
        background-color: rgba(102, 126, 234, 0.1);
    }

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
        color: #4a5568;
        cursor: pointer;
        user-select: none;
    }

    .remember-me input {
        width: 18px;
        height: 18px;
        margin: 0;
        accent-color: #667eea;
        cursor: pointer;
    }

    .btn-login {
        width: 100%;
        min-height: 52px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 1rem;
        background: linear-gradient(90deg, #667eea, #5a67d8);
        border: none;
        color: white;
        transition: all 0.2s ease;
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
        background: linear-gradient(90deg, #5a67d8, #6b46c1);
    }

    .register-link {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .register-link a {
        text-decoration: none;
        font-weight: 600;
        color: #667eea;
        transition: all 0.2s ease;
        margin-left: 4px;
    }

    .register-link a:hover {
        color: #5a67d8;
        text-decoration: underline;
    }

    .alert {
        border-radius: 14px;
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 520px) {
        .login-card {
            margin: 20px 16px;
            max-width: none;
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
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password-field');

        if (togglePassword && passwordField) {
            const updateToggleButton = () => {
                const isVisible = passwordField.type === 'text';
                const icon = togglePassword.querySelector('i');

                if (isVisible) {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                    togglePassword.setAttribute('aria-label', '<?= __('Ocultar contraseña') ?>');
                    togglePassword.setAttribute('aria-pressed', 'true');
                } else {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                    togglePassword.setAttribute('aria-label', '<?= __('Mostrar contraseña') ?>');
                    togglePassword.setAttribute('aria-pressed', 'false');
                }
            };

            togglePassword.addEventListener('click', function () {
                passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
                updateToggleButton();
                passwordField.focus();
            });
        }
    });
</script>
<?php $this->end(); ?>