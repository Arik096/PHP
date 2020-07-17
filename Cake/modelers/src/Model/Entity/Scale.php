<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scale Entity
 *
 * @property int $id
 * @property int $model_type_id
 * @property string $scale
 * @property bool $approved_yn
 * @property int|null $sort_order
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ModelType $model_type
 * @property \App\Model\Entity\Submission[] $submissions
 */
class Scale extends Entity
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
        'model_type_id' => true,
        'scale' => true,
        'approved_yn' => true,
        'sort_order' => true,
        'created' => true,
        'modified' => true,
        'model_type' => true,
        'submissions' => true,
    ];
}
