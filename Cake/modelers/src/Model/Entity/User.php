<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity {

    protected $_accessible = [
        'forum_user' => true,
        'email' => true,
        'public_yn' => true,
        'name' => true,
        'last_ip' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'password' => true,
        'status' => true,
        'submissions' => true,
        'password' => true,
    ];

    protected function _setPassword(string $password) : ?string {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}