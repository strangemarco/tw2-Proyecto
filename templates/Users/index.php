<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
$this->assign('title', __('Gestión de Usuarios'));
?>

<div class="users-page">
    <div class="users-summary">
        <div class="summary-card">
            <div class="summary-icon bg-primary-soft">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h3><?= $this->Paginator->counter('{{count}}') ?></h3>
                <p><?= __('Total de usuarios') ?></p>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon bg-success-soft">
                <i class="fas fa-user-check"></i>
            </div>
            <div>
                <h3><?= count($users) ?></h3>
                <p><?= __('Usuarios en esta página') ?></p>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon bg-info-soft">
                <i class="fas fa-language"></i>
            </div>
            <div>
                <h3>2</h3>
                <p><?= __('Idiomas') ?></p>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon bg-warning-soft">
                <i class="fas fa-calendar-days"></i>
            </div>
            <div>
                <h3><?= date('d/m') ?></h3>
                <p><?= __('Fecha actual') ?></p>
            </div>
        </div>
    </div>

    <div class="section-card">
        <div class="section-header">
            <div>
                <h2><i class="fas fa-table"></i> <?= __('Listado de Usuarios') ?></h2>
                <p><?= __('Administra los usuarios registrados en el sistema.') ?></p>
            </div>

            <div class="section-actions">
                <?= $this->Html->link(
                    '<i class="fas fa-plus-circle"></i><span>' . __('Nuevo Usuario') . '</span>',
                    ['action' => 'add'],
                    [
                        'class' => 'btn-action btn-primary-custom',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div>

        <div class="table-wrap">
            <table class="table-users">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id', '#') ?></th>
                        <th><?= $this->Paginator->sort('nombre', __('Nombre')) ?></th>
                        <th><?= $this->Paginator->sort('apellido', __('Apellido')) ?></th>
                        <th><?= $this->Paginator->sort('correo', __('Correo')) ?></th>
                        <th><?= $this->Paginator->sort('created', __('Registro')) ?></th>
                        <th><?= $this->Paginator->sort('modified', __('Actualización')) ?></th>
                        <th><?= $this->Paginator->sort('languaje', __('Idioma')) ?></th>
                        <th class="text-center"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($users) > 0): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="user-id">#<?= $this->Number->format($user->id) ?></td>

                                <td>
                                    <div class="user-main">
                                        <div class="user-avatar">
                                            <?= strtoupper(substr($user->nombre, 0, 1)) . strtoupper(substr($user->apellido, 0, 1)) ?>
                                        </div>
                                        <span><?= h($user->nombre) ?></span>
                                    </div>
                                </td>

                                <td><?= h($user->apellido) ?></td>

                                <td>
                                    <a href="mailto:<?= h($user->correo) ?>" class="mail-link">
                                        <i class="fas fa-envelope"></i>
                                        <?= h($user->correo) ?>
                                    </a>
                                </td>

                                <td>
                                    <?= $user->created ? $user->created->format('d/m/Y H:i') : '—' ?>
                                </td>

                                <td>
                                    <?= $user->modified ? $user->modified->format('d/m/Y H:i') : '—' ?>
                                </td>

                                <td>
                                    <?php
                                    $lang = strtolower($user->languaje ?? 'es');
                                    if ($lang === 'en') {
                                        $langText = 'English';
                                        $langClass = 'badge-en';
                                    } else {
                                        $langText = 'Español';
                                        $langClass = 'badge-es';
                                    }
                                    ?>
                                    <span class="lang-badge <?= $langClass ?>">
                                        <?= h($langText) ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <?= $this->Html->link(
                                            '<i class="fas fa-eye"></i>',
                                            ['action' => 'view', $user->id],
                                            [
                                                'class' => 'icon-btn btn-view',
                                                'escape' => false,
                                                'title' => __('Ver')
                                            ]
                                        ) ?>

                                        <?= $this->Html->link(
                                            '<i class="fas fa-pen"></i>',
                                            ['action' => 'edit', $user->id],
                                            [
                                                'class' => 'icon-btn btn-edit',
                                                'escape' => false,
                                                'title' => __('Editar')
                                            ]
                                        ) ?>

                                        <?= $this->Form->postLink(
                                            '<i class="fas fa-trash"></i>',
                                            ['action' => 'delete', $user->id],
                                            [
                                                'method' => 'delete',
                                                'confirm' => __('¿Estás seguro de eliminar al usuario "{0} {1}"?', $user->nombre, $user->apellido),
                                                'class' => 'icon-btn btn-delete',
                                                'escape' => false,
                                                'title' => __('Eliminar')
                                            ]
                                        ) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="fas fa-users-slash"></i>
                                    <h3><?= __('No hay usuarios registrados') ?></h3>
                                    <p><?= __('Comienza agregando un nuevo usuario al sistema.') ?></p>
                                    <?= $this->Html->link(
                                        '<i class="fas fa-plus-circle"></i><span>' . __('Crear primer usuario') . '</span>',
                                        ['action' => 'add'],
                                        [
                                            'class' => 'btn-action btn-primary-custom',
                                            'escape' => false
                                        ]
                                    ) ?>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination-box">
        <div class="pagination-info">
            <?= $this->Paginator->counter(
                __('Mostrando <strong>{{current}}</strong> de <strong>{{count}}</strong> usuarios · Página <strong>{{page}}</strong> de <strong>{{pages}}</strong>')
            ) ?>
        </div>

        <div class="pagination-links">
            <?= $this->Paginator->first('<<', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('>', ['escape' => false]) ?>
            <?= $this->Paginator->last('>>', ['escape' => false]) ?>
        </div>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .users-page {
        padding: 24px;
    }

    .users-summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .summary-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
    }

    .summary-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .bg-primary-soft {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .bg-success-soft {
        background: #dcfce7;
        color: #15803d;
    }

    .bg-info-soft {
        background: #e0f2fe;
        color: #0369a1;
    }

    .bg-warning-soft {
        background: #fef3c7;
        color: #b45309;
    }

    .summary-card h3 {
        margin: 0;
        font-size: 24px;
        color: #0f172a;
    }

    .summary-card p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .section-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
    }

    .section-header {
        padding: 22px 24px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .section-header h2 {
        margin: 0;
        font-size: 22px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #0f172a;
    }

    .section-header p {
        margin: 6px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-action:hover {
        transform: translateY(-1px);
        text-decoration: none;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
    }

    .btn-primary-custom:hover {
        color: #fff;
    }

    .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .table-users {
        width: 100%;
        border-collapse: collapse;
    }

    .table-users th,
    .table-users td {
        padding: 16px 18px;
        border-bottom: 1px solid #e2e8f0;
        text-align: left;
        vertical-align: middle;
    }

    .table-users th {
        background: #f8fafc;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .table-users tbody tr:hover {
        background: #f8fbff;
    }

    .text-center {
        text-align: center;
    }

    .user-id {
        font-weight: 700;
        color: #2563eb;
    }

    .user-main {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
    }

    .mail-link {
        color: #0f172a;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }

    .mail-link:hover {
        color: #2563eb;
    }

    .lang-badge {
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

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: .2s ease;
    }

    .icon-btn:hover {
        transform: translateY(-1px);
        text-decoration: none;
    }

    .btn-view {
        background: #e0f2fe;
        color: #0284c7;
    }

    .btn-view:hover {
        background: #0284c7;
        color: #fff;
    }

    .btn-edit {
        background: #fef3c7;
        color: #d97706;
    }

    .btn-edit:hover {
        background: #d97706;
        color: #fff;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: #fff;
    }

    .empty-state {
        padding: 56px 20px;
        text-align: center;
        color: #64748b;
    }

    .empty-state i {
        font-size: 52px;
        margin-bottom: 16px;
        color: #94a3b8;
    }

    .empty-state h3 {
        margin: 0 0 8px;
        color: #334155;
    }

    .empty-state p {
        margin: 0 0 18px;
    }

    .pagination-box {
        margin-top: 20px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 18px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .pagination-info {
        color: #64748b;
        font-size: 14px;
    }

    .pagination-links {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .pagination-links a,
    .pagination-links span {
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
    }

    .pagination-links .current {
        background: #2563eb;
        color: #fff;
    }

    @media (max-width: 992px) {
        .users-summary {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .users-page {
            padding: 16px;
        }

        .users-summary {
            grid-template-columns: 1fr;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .section-actions {
            width: 100%;
        }

        .section-actions .btn-action {
            width: 100%;
            justify-content: center;
        }

        .pagination-box {
            flex-direction: column;
            align-items: flex-start;
        }

        .pagination-links {
            width: 100%;
        }

        .action-buttons {
            flex-direction: column;
        }

        .icon-btn {
            width: 100%;
        }
    }
</style>
<?php $this->end(); ?>