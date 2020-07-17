<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manufacturer Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $website
 * @property int $status_id
 * @property bool $approved_yn
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Submission[] $submissions
 */
class Manufacturer extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'website' => true,
        'status_id' => true,
        'approved_yn' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'submissions' => true,
    ];
}
