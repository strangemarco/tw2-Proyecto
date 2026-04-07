<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', __('Detalle del Usuario'));
?>

<div class="user-view-page">
    <div class="view-card">
        <div class="view-header">
            <div class="user-avatar-large">
                <?= strtoupper(substr($user->nombre, 0, 1)) . strtoupper(substr($user->apellido, 0, 1)) ?>
            </div>

            <div class="user-title">
                <h1><?= h($user->nombre) . ' ' . h($user->apellido) ?></h1>
                <p class="user-email">
                    <i class="fas fa-envelope"></i>
                    <?= h($user->correo) ?>
                </p>
            </div>
        </div>

        <div class="info-sections">
            <div class="info-section">
                <h2><i class="fas fa-user-circle"></i> <?= __('Información Personal') ?></h2>

                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label"><?= __('Nombre') ?></span>
                        <span class="info-value"><?= h($user->nombre) ?></span>
                    </div>

                    <div class="info-item">
                        <span class="info-label"><?= __('Apellido') ?></span>
                        <span class="info-value"><?= h($user->apellido) ?></span>
                    </div>

                    <div class="info-item">
                        <span class="info-label"><?= __('Correo Electrónico') ?></span>
                        <span class="info-value">
                            <a href="mailto:<?= h($user->correo) ?>" class="email-link">
                                <?= h($user->correo) ?>
                            </a>
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="info-label"><?= __('Idioma') ?></span>
                        <span class="info-value">
                            <?php
                            $langBadges = [
                                'es' => ['class' => 'badge-es', 'text' => 'Español'],
                                'en' => ['class' => 'badge-en', 'text' => 'English'],
                                'pt' => ['class' => 'badge-pt', 'text' => 'Português']
                            ];
                            $lang = strtolower($user->languaje ?? 'es');
                            $badge = $langBadges[$lang] ?? $langBadges['es'];
                            ?>
                            <span class="language-badge <?= $badge['class'] ?>">
                                <?= h($badge['text']) ?>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h2><i class="fas fa-circle-info"></i> <?= __('Información del Sistema') ?></h2>

                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label"><?= __('ID') ?></span>
                        <span class="info-value">
                            <span class="id-badge">#<?= $this->Number->format($user->id) ?></span>
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="info-label"><?= __('Fecha de creación') ?></span>
                        <span class="info-value">
                            <?= $user->created ? $user->created->format('d/m/Y H:i:s') : '—' ?>
                        </span>
                    </div>

                    <div class="info-item">
                        <span class="info-label"><?= __('Última actualización') ?></span>
                        <span class="info-value">
                            <?= $user->modified ? $user->modified->format('d/m/Y H:i:s') : '—' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="view-actions">
            <?= $this->Html->link(
                '<i class="fas fa-arrow-left"></i><span>' . __('Volver al listado') . '</span>',
                ['action' => 'index'],
                [
                    'class' => 'btn-action btn-cancel',
                    'escape' => false
                ]
            ) ?>

            <?= $this->Html->link(
                '<i class="fas fa-pen"></i><span>' . __('Editar Usuario') . '</span>',
                ['action' => 'edit', $user->id],
                [
                    'class' => 'btn-action btn-edit',
                    'escape' => false
                ]
            ) ?>

            <?= $this->Html->link(
                '<i class="fas fa-plus"></i><span>' . __('Nuevo Usuario') . '</span>',
                ['action' => 'add'],
                [
                    'class' => 'btn-action btn-save',
                    'escape' => false
                ]
            ) ?>

            <?= $this->Form->postLink(
                '<i class="fas fa-trash"></i><span>' . __('Eliminar') . '</span>',
                ['action' => 'delete', $user->id],
                [
                    'class' => 'btn-action btn-delete',
                    'escape' => false,
                    'confirm' => __('¿Estás seguro de eliminar al usuario "{0} {1}"?', $user->nombre, $user->apellido)
                ]
            ) ?>
        </div>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .user-view-page {
        padding: 24px;
    }

    .view-card {
        max-width: 950px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .view-header {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 30px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #ffffff;
    }

    .user-avatar-large {
        width: 84px;
        height: 84px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .user-title h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 800;
    }

    .user-email {
        margin: 8px 0 0;
        font-size: 14px;
        opacity: 0.95;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .info-sections {
        padding: 30px;
    }

    .info-section {
        margin-bottom: 24px;
        padding: 22px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
    }

    .info-section:last-child {
        margin-bottom: 0;
    }

    .info-section h2 {
        margin: 0 0 18px;
        font-size: 18px;
        color: #1d4ed8;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 16px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
    }

    .info-label {
        font-size: 12px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: #0f172a;
        line-height: 1.5;
        word-break: break-word;
    }

    .email-link {
        color: #2563eb;
        text-decoration: none;
    }

    .email-link:hover {
        text-decoration: underline;
    }

    .language-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .badge-es {
        background: #fee2e2;
        color: #b91c1c;
    }

    .badge-en {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .badge-pt {
        background: #dcfce7;
        color: #15803d;
    }

    .id-badge {
        display: inline-block;
        padding: 6px 12px;
        background: #2563eb;
        color: #ffffff;
        border-radius: 10px;
        font-weight: 700;
    }

    .view-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        flex-wrap: wrap;
        padding: 0 30px 30px;
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

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #d97706, #b45309);
    }

    .btn-cancel {
        background: #64748b;
    }

    .btn-cancel:hover {
        background: #475569;
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #b91c1c, #991b1b);
    }

    @media (max-width: 768px) {
        .user-view-page {
            padding: 16px;
        }

        .view-header,
        .info-sections {
            padding: 20px;
        }

        .view-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .view-actions {
            flex-direction: column;
            padding: 0 20px 20px;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>
<?php $this->end(); ?>