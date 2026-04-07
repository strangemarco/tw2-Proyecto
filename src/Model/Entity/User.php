<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $password
 * @property string|null $languaje
 */
class User extends Entity
{
    protected array $_accessible = [
        'nombre' => true,
        'apellido' => true,
        'correo' => true,
        'created' => true,
        'modified' => true,
        'password' => true,
        'languaje' => true,
    ];

    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(?string $password): ?string
    {
        if (!empty($password)) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $password;
    }
}