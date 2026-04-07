<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
$this->assign('title', $categoria->isNew() ? __('Nueva Categoría') : __('Editar Categoría'));

$isEdit = !$categoria->isNew();
$pageTitle = $isEdit ? __('Editar Categoría') : __('Nueva Categoría');
$actionLabel = $isEdit ? __('Actualizar') : __('Guardar');
?>

<div class="categoria-page">
    <div class="categoria-card">
        <div class="categoria-header">
            <div>
                <h1><?= h($pageTitle) ?></h1>
                <p>
                    <?= $isEdit
                        ? __('Modifica la información de la categoría.')
                        : __('Completa los campos para registrar una nueva categoría.') ?>
                </p>
            </div>
        </div>

        <div class="categoria-body">
            <?= $this->Form->create($categoria, ['novalidate' => true]) ?>

            <div class="form-group">
                <?= $this->Form->label('nombre', __('Nombre de la categoría'), ['class' => 'form-label']) ?>
                <?= $this->Form->text('nombre', [
                    'class' => 'form-control',
                    'required' => true,
                    'maxlength' => 100,
                    'placeholder' => __('Ej: Electrónica, Hogar, Ropa...')
                ]) ?>
                <small class="help-text"><?= __('Máximo 100 caracteres.') ?></small>
            </div>

            <div class="form-group">
                <?= $this->Form->label('descripcion', __('Descripción'), ['class' => 'form-label']) ?>
                <?= $this->Form->textarea('descripcion', [
                    'class' => 'form-control',
                    'rows' => 4,
                    'maxlength' => 500,
                    'placeholder' => __('Describe brevemente esta categoría...')
                ]) ?>
                <small class="help-text"><?= __('Opcional. Máximo 500 caracteres.') ?></small>
            </div>

            <div class="form-check-custom">
                <?= $this->Form->checkbox('activo', [
                    'class' => 'form-check-input',
                    'id' => 'activo',
                    'hiddenField' => true
                ]) ?>
                <?= $this->Form->label('activo', __('Categoría activa'), ['class' => 'form-check-label']) ?>
            </div>

            <div class="acciones">
                <?= $this->Form->button(
                    '<i class="fas fa-floppy-disk"></i><span>' . h($actionLabel) . '</span>',
                    [
                        'class' => 'btn-action btn-save',
                        'escapeTitle' => false
                    ]
                ) ?>

                <?= $this->Html->link(
                    '<i class="fas fa-arrow-left"></i><span>' . __('Cancelar') . '</span>',
                    ['action' => 'index'],
                    [
                        'class' => 'btn-action btn-cancel',
                        'escape' => false
                    ]
                ) ?>

                <?php if ($isEdit): ?>
                    <?= $this->Form->postLink(
                        '<i class="fas fa-trash"></i><span>' . __('Eliminar') . '</span>',
                        ['action' => 'delete', $categoria->id],
                        [
                            'class' => 'btn-action btn-delete',
                            'escape' => false,
                            'confirm' => __('¿Estás seguro de eliminar la categoría "{0}"?', $categoria->nombre)
                        ]
                    ) ?>
                <?php endif; ?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php $this->append('css'); ?>
<style>
    .categoria-page {
        padding: 24px;
    }

    .categoria-card {
        max-width: 860px;
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

    .categoria-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #334155;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 13px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        outline: none;
        font-size: 14px;
        background: #ffffff;
        color: #0f172a;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .help-text {
        display: block;
        margin-top: 6px;
        font-size: 13px;
        color: #64748b;
    }

    .form-check-custom {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 10px 0 28px;
        padding: 14px 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        margin: 0;
        accent-color: #2563eb;
        cursor: pointer;
    }

    .form-check-label {
        margin: 0;
        font-weight: 600;
        color: #334155;
        cursor: pointer;
    }

    .acciones {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 10px;
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

    .btn-save {
        background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #15803d 0%, #166534 100%);
    }

    .btn-cancel {
        background: #64748b;
    }

    .btn-cancel:hover {
        background: #475569;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    }

    @media (max-width: 640px) {
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

        .acciones {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>
<?php $this->end(); ?>