<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
$this->assign('title', __('Detalle de la Categoría'));
?>

<div class="categoria-page">
    <div class="categoria-card">
        <div class="categoria-header">
            <div>
                <h1><?= __('Detalle de la Categoría') ?></h1>
                <p><?= __('Consulta la información completa de la categoría seleccionada.') ?></p>
            </div>

            <div class="header-actions">
                <?= $this->Html->link(
                    '<i class="fas fa-arrow-left"></i><span>' . __('Volver') . '</span>',
                    ['action' => 'index'],
                    [
                        'class' => 'btn-action btn-back',
                        'escape' => false
                    ]
                ) ?>

                <?= $this->Html->link(
                    '<i class="fas fa-pen"></i><span>' . __('Editar') . '</span>',
                    ['action' => 'edit', $categoria->id],
                    [
                        'class' => 'btn-action btn-edit',
                        'escape' => false
                    ]
                ) ?>

                <?= $this->Form->postLink(
                    '<i class="fas fa-trash"></i><span>' . __('Eliminar') . '</span>',
                    ['action' => 'delete', $categoria->id],
                    [
                        'class' => 'btn-action btn-delete',
                        'escape' => false,
                        'confirm' => __('¿Estás seguro de eliminar la categoría "{0}"?', $categoria->nombre)
                    ]
                ) ?>
            </div>
        </div>

        <div class="categoria-body">
            <div class="detalle-grid">
                <div class="detalle-item">
                    <span class="detalle-label"><?= __('ID') ?></span>
                    <span class="detalle-value"><?= h($categoria->id) ?></span>
                </div>

                <div class="detalle-item">
                    <span class="detalle-label"><?= __('Nombre') ?></span>
                    <span class="detalle-value"><?= h($categoria->nombre) ?></span>
                </div>

                <div class="detalle-item detalle-full">
                    <span class="detalle-label"><?= __('Descripción') ?></span>
                    <span class="detalle-value">
                        <?= !empty($categoria->descripcion) ? h($categoria->descripcion) : __('Sin descripción') ?>
                    </span>
                </div>

                <div class="detalle-item">
                    <span class="detalle-label"><?= __('Estado') ?></span>
                    <span class="detalle-value">
                        <?php if ($categoria->activo): ?>
                            <span class="estado estado-activo">
                                <i class="fas fa-circle-check"></i>
                                <?= __('Activo') ?>
                            </span>
                        <?php else: ?>
                            <span class="estado estado-inactivo">
                                <i class="fas fa-circle-xmark"></i>
                                <?= __('Inactivo') ?>
                            </span>
                        <?php endif; ?>
                    </span>
                </div>

                <div class="detalle-item">
                    <span class="detalle-label"><?= __('Fecha de creación') ?></span>
                    <span class="detalle-value">
                        <?= $categoria->created ? $categoria->created->format('d/m/Y H:i:s') : '—' ?>
                    </span>
                </div>

                <div class="detalle-item">
                    <span class="detalle-label"><?= __('Última modificación') ?></span>
                    <span class="detalle-value">
                        <?= $categoria->modified ? $categoria->modified->format('d/m/Y H:i:s') : '—' ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .categoria-page {
        padding: 24px;
    }

    .categoria-card {
        max-width: 950px;
        margin: 0 auto;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
    }

    .categoria-header {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        color: #ffffff;
        padding: 28px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .categoria-header h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 800;
    }

    .categoria-header p {
        margin: 8px 0 0;
        font-size: 14px;
        opacity: 0.95;
    }

    .header-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .categoria-body {
        padding: 30px;
    }

    .detalle-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .detalle-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .detalle-full {
        grid-column: 1 / -1;
    }

    .detalle-label {
        font-size: 12px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .detalle-value {
        font-size: 15px;
        color: #0f172a;
        line-height: 1.5;
        word-break: break-word;
    }

    .estado {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        width: fit-content;
    }

    .estado-activo {
        background: #dcfce7;
        color: #166534;
    }

    .estado-inactivo {
        background: #fee2e2;
        color: #991b1b;
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
        color: #ffffff;
        text-decoration: none;
    }

    .btn-back {
        background: #64748b;
    }

    .btn-back:hover {
        background: #475569;
    }

    .btn-edit {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    }

    @media (max-width: 768px) {
        .categoria-page {
            padding: 16px;
        }

        .categoria-header,
        .categoria-body {
            padding: 20px;
        }

        .categoria-header h1 {
            font-size: 24px;
        }

        .detalle-grid {
            grid-template-columns: 1fr;
        }

        .detalle-full {
            grid-column: auto;
        }

        .header-actions {
            width: 100%;
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>
<?php $this->end(); ?>