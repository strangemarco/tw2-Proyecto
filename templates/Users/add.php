<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', __('Crear Usuario'));
?>

<div class="user-form-page">
    <div class="form-card">
        <div class="form-header">
            <div class="form-header-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div>
                <h1><?= __('Crear Nuevo Usuario') ?></h1>
                <p><?= __('Completa los campos para registrar un nuevo usuario en el sistema.') ?></p>
            </div>
        </div>

        <?= $this->Form->create($user, ['class' => 'modern-user-form']) ?>

        <div class="form-section">
            <h2><i class="fas fa-user-circle"></i> <?= __('Información Personal') ?></h2>

            <div class="form-grid">
                <div class="form-group">
                    <?= $this->Form->label('nombre', __('Nombre'), ['class' => 'form-label']) ?>
                    <?= $this->Form->control('nombre', [
                        'label' => false,
                        'placeholder' => __('Ingrese el nombre'),
                        'class' => 'form-control',
                        'required' => true
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->label('apellido', __('Apellido'), ['class' => 'form-label']) ?>
                    <?= $this->Form->control('apellido', [
                        'label' => false,
                        'placeholder' => __('Ingrese el apellido'),
                        'class' => 'form-control',
                        'required' => true
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h2><i class="fas fa-envelope"></i> <?= __('Información de Contacto') ?></h2>

            <div class="form-group">
                <?= $this->Form->label('correo', __('Correo Electrónico'), ['class' => 'form-label']) ?>
                <?= $this->Form->control('correo', [
                    'label' => false,
                    'placeholder' => 'usuario@ejemplo.com',
                    'class' => 'form-control',
                    'type' => 'email',
                    'required' => true
                ]) ?>
                <small class="help-text">
                    <i class="fas fa-circle-info"></i>
                    <?= __('El correo será usado para iniciar sesión.') ?>
                </small>
            </div>
        </div>

        <div class="form-section">
            <h2><i class="fas fa-lock"></i> <?= __('Seguridad') ?></h2>

            <div class="form-group">
                <?= $this->Form->label('password', __('Contraseña'), ['class' => 'form-label']) ?>
                <?= $this->Form->control('password', [
                    'label' => false,
                    'placeholder' => __('Ingrese una contraseña segura'),
                    'class' => 'form-control',
                    'type' => 'password',
                    'required' => true
                ]) ?>

                <div class="password-strength" id="password-strength">
                    <div class="strength-bar"></div>
                    <span class="strength-text"></span>
                </div>

                <small class="help-text">
                    <i class="fas fa-shield-halved"></i>
                    <?= __('Mínimo 6 caracteres, incluir letras y números.') ?>
                </small>
            </div>
        </div>

        <div class="form-section">
            <h2><i class="fas fa-language"></i> <?= __('Preferencias') ?></h2>

            <div class="form-group">
                <?= $this->Form->label('languaje', __('Idioma'), ['class' => 'form-label']) ?>
                <?= $this->Form->control('languaje', [
                    'label' => false,
                    'options' => [
                        'es' => 'Español',
                        'en' => 'English',
                        'pt' => 'Português'
                    ],
                    'class' => 'form-select',
                    'default' => 'es',
                    'required' => true
                ]) ?>
            </div>
        </div>

        <div class="form-actions">
            <?= $this->Form->button(
                '<i class="fas fa-floppy-disk"></i><span>' . __('Guardar Usuario') . '</span>',
                [
                    'class' => 'btn-action btn-save',
                    'escapeTitle' => false
                ]
            ) ?>

            <?= $this->Html->link(
                '<i class="fas fa-arrow-left"></i><span>' . __('Volver al listado') . '</span>',
                ['action' => 'index'],
                [
                    'class' => 'btn-action btn-cancel',
                    'escape' => false
                ]
            ) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .user-form-page {
        padding: 24px;
    }

    .form-card {
        max-width: 900px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .form-header {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 28px 30px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #ffffff;
    }

    .form-header-icon {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        flex-shrink: 0;
    }

    .form-header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
    }

    .form-header p {
        margin: 6px 0 0;
        font-size: 14px;
        opacity: 0.95;
    }

    .modern-user-form {
        padding: 30px;
    }

    .form-section {
        margin-bottom: 24px;
        padding: 22px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
    }

    .form-section h2 {
        margin: 0 0 18px;
        font-size: 18px;
        color: #1d4ed8;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #334155;
        font-size: 14px;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        background: #ffffff;
        color: #0f172a;
        font-size: 14px;
        outline: none;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    .help-text {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 8px;
        color: #64748b;
        font-size: 12px;
    }

    .password-strength {
        margin-top: 10px;
    }

    .strength-bar {
        width: 0;
        height: 6px;
        border-radius: 999px;
        background: #cbd5e1;
        transition: all 0.3s ease;
    }

    .strength-text {
        display: inline-block;
        margin-top: 6px;
        font-size: 12px;
        color: #64748b;
    }

    .password-strength.strength-weak .strength-bar {
        width: 33%;
        background: #dc2626;
    }

    .password-strength.strength-medium .strength-bar {
        width: 66%;
        background: #f59e0b;
    }

    .password-strength.strength-strong .strength-bar {
        width: 100%;
        background: #16a34a;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        flex-wrap: wrap;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #e2e8f0;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 12px;
        border: none;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #ffffff;
    }

    .btn-action:hover {
        transform: translateY(-1px);
        text-decoration: none;
        color: #ffffff;
    }

    .btn-save {
        background: linear-gradient(135deg, #16a34a, #15803d);
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #15803d, #166534);
    }

    .btn-cancel {
        background: #64748b;
    }

    .btn-cancel:hover {
        background: #475569;
    }

    @media (max-width: 768px) {
        .user-form-page {
            padding: 16px;
        }

        .form-header,
        .modern-user-form {
            padding: 20px;
        }

        .form-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.querySelector('input[name="password"]');
        const strengthDiv = document.getElementById('password-strength');

        if (!passwordInput || !strengthDiv) return;

        passwordInput.addEventListener('input', function () {
            const password = this.value;
            const strengthText = strengthDiv.querySelector('.strength-text');

            strengthDiv.classList.remove('strength-weak', 'strength-medium', 'strength-strong');

            if (password.length === 0) {
                strengthText.textContent = '';
                return;
            }

            const strength = checkPasswordStrength(password);

            if (strength === 'weak') {
                strengthDiv.classList.add('strength-weak');
                strengthText.textContent = 'Contraseña débil';
            } else if (strength === 'medium') {
                strengthDiv.classList.add('strength-medium');
                strengthText.textContent = 'Contraseña media';
            } else {
                strengthDiv.classList.add('strength-strong');
                strengthText.textContent = 'Contraseña fuerte';
            }
        });

        function checkPasswordStrength(password) {
            let strength = 0;

            if (password.length >= 6) strength++;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[$@#&!]/.test(password)) strength++;

            if (strength <= 2) return 'weak';
            if (strength <= 4) return 'medium';
            return 'strong';
        }
    });
</script>
<?php $this->end(); ?>