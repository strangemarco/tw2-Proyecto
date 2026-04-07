<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Categoria> $categorias
 */
$this->assign('title', __('Categorías'));
?>

<div class="categorias-page">
    <div class="categorias-card">
        <div class="categorias-header">
            <div>
                <h1><?= __('Listado de Categorías') ?></h1>
                <p><?= __('Administra las categorías registradas en el sistema') ?></p>
            </div>

            <div class="header-actions">
                <?= $this->Html->link(
                    '<i class="fas fa-plus"></i> ' . __('Nueva Categoría'),
                    ['action' => 'add'],
                    ['class' => 'btn-action btn-primary-custom', 'escape' => false]
                ) ?>
            </div>
        </div>

        <div class="categorias-toolbar">
            <div class="search-box">
                <?= $this->Form->create(null, ['type' => 'get']) ?>
                    <div class="search-group">
                        <?= $this->Form->control('search', [
                            'label' => false,
                            'placeholder' => __('Buscar por nombre o descripción...'),
                            'value' => $this->request->getQuery('search'),
                            'class' => 'form-input'
                        ]) ?>

                        <button type="submit" class="btn-action btn-dark-custom">
                            <i class="fas fa-search"></i>
                            <span><?= __('Buscar') ?></span>
                        </button>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>

        <div class="table-wrap">
            <table class="categorias-table">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                        <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                        <th><?= $this->Paginator->sort('descripcion', __('Descripción')) ?></th>
                        <th><?= $this->Paginator->sort('activo', __('Estado')) ?></th>
                        <th><?= $this->Paginator->sort('created', __('Creado')) ?></th>
                        <th class="text-center"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$categorias->isEmpty()): ?>
                        <?php foreach ($categorias as $categoria): ?>
                            <tr>
                                <td><?= h($categoria->id) ?></td>

                                <td class="fw-bold">
                                    <?= h($categoria->nombre) ?>
                                </td>

                                <td>
                                    <?= h($categoria->descripcion ?: __('Sin descripción')) ?>
                                </td>

                                <td>
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
                                </td>

                                <td>
                                    <?= $categoria->created ? $categoria->created->format('d/m/Y H:i') : '—' ?>
                                </td>

                                <td>
                                    <div class="acciones">
                                        <?= $this->Html->link(
                                            '<i class="fas fa-eye"></i>',
                                            ['action' => 'view', $categoria->id],
                                            [
                                                'class' => 'btn-icon btn-view',
                                                'escape' => false,
                                                'title' => __('Ver')
                                            ]
                                        ) ?>

                                        <?= $this->Html->link(
                                            '<i class="fas fa-pen"></i>',
                                            ['action' => 'edit', $categoria->id],
                                            [
                                                'class' => 'btn-icon btn-edit',
                                                'escape' => false,
                                                'title' => __('Editar')
                                            ]
                                        ) ?>

                                        <?= $this->Form->postLink(
                                            '<i class="fas fa-trash"></i>',
                                            ['action' => 'delete', $categoria->id],
                                            [
                                                'class' => 'btn-icon btn-delete',
                                                'escape' => false,
                                                'title' => __('Eliminar'),
                                                'confirm' => __('¿Seguro que deseas eliminar la categoría "{0}"?', $categoria->nombre)
                                            ]
                                        ) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="empty-message">
                                <div class="empty-box">
                                    <i class="fas fa-folder-open empty-icon"></i>
                                    <p><?= __('No hay categorías registradas.') ?></p>

                                    <?= $this->Html->link(
                                        '<i class="fas fa-plus"></i> ' . __('Crear categoría'),
                                        ['action' => 'add'],
                                        ['class' => 'btn-action btn-primary-custom', 'escape' => false]
                                    ) ?>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if (!$categorias->isEmpty()): ?>
            <div class="categorias-footer">
                <div class="contador">
                    <?= $this->Paginator->counter(__('Mostrando {{current}} de {{count}} categorías - Página {{page}} de {{pages}}')) ?>
                </div>

                <div class="paginacion">
                    <?= $this->Paginator->prev('«') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('»') ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .categorias-page {
        padding: 24px;
    }

    .categorias-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .categorias-header {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #ffffff;
        padding: 28px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .categorias-header h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 800;
    }

    .categorias-header p {
        margin: 6px 0 0;
        font-size: 14px;
        opacity: 0.95;
    }

    .categorias-toolbar {
        padding: 20px 30px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .search-box {
        width: 100%;
    }

    .search-group {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .form-input {
        flex: 1;
        min-width: 260px;
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

    .form-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
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
    }

    .btn-action:hover {
        transform: translateY(-1px);
        text-decoration: none;
    }

    .btn-primary-custom {
        background: #ffffff;
        color: #1d4ed8;
    }

    .btn-primary-custom:hover {
        color: #1d4ed8;
        background: #f8fafc;
    }

    .btn-dark-custom {
        background: #111827;
        color: #ffffff;
    }

    .btn-dark-custom:hover {
        color: #ffffff;
        background: #0f172a;
    }

    .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .categorias-table {
        width: 100%;
        border-collapse: collapse;
    }

    .categorias-table thead {
        background: #f8fafc;
    }

    .categorias-table th,
    .categorias-table td {
        padding: 16px 18px;
        border-bottom: 1px solid #e2e8f0;
        text-align: left;
        vertical-align: middle;
    }

    .categorias-table th {
        color: #475569;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
    }

    .categorias-table tbody tr:hover {
        background: #f8fbff;
    }

    .text-center {
        text-align: center;
    }

    .fw-bold {
        font-weight: 700;
    }

    .estado {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .estado-activo {
        background: #dcfce7;
        color: #166534;
    }

    .estado-inactivo {
        background: #fee2e2;
        color: #991b1b;
    }

    .acciones {
        display: flex;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #ffffff;
        transition: all 0.2s ease;
        font-size: 14px;
    }

    .btn-icon:hover {
        transform: translateY(-1px);
        color: #ffffff;
        text-decoration: none;
    }

    .btn-view {
        background: #0ea5e9;
    }

    .btn-view:hover {
        background: #0284c7;
    }

    .btn-edit {
        background: #f59e0b;
    }

    .btn-edit:hover {
        background: #d97706;
    }

    .btn-delete {
        background: #dc2626;
    }

    .btn-delete:hover {
        background: #b91c1c;
    }

    .categorias-footer {
        padding: 18px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
    }

    .contador {
        color: #64748b;
        font-size: 14px;
    }

    .paginacion {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .paginacion a,
    .paginacion span {
        min-width: 36px;
        height: 36px;
        padding: 0 10px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        color: #0f172a;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    .paginacion .current {
        background: #2563eb;
        color: #ffffff;
    }

    .empty-message {
        text-align: center;
        padding: 50px 20px;
    }

    .empty-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        color: #64748b;
    }

    .empty-icon {
        font-size: 48px;
        color: #94a3b8;
    }

    @media (max-width: 768px) {
        .categorias-page {
            padding: 16px;
        }

        .categorias-header,
        .categorias-toolbar,
        .categorias-footer {
            padding: 20px;
        }

        .categorias-header h1 {
            font-size: 24px;
        }

        .search-group {
            flex-direction: column;
        }

        .form-input {
            width: 100%;
            min-width: 100%;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions .btn-action {
            width: 100%;
        }

        .categorias-footer {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
<?php $this->end(); ?>