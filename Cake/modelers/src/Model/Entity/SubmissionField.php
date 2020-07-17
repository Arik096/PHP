<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubmissionField Entity
 *
 * @property int $id
 * @property int $model_type_id
 * @property string $field_name
 * @property string $label
 * @property string $element_type
 * @property string|null $enum_options
 * @property bool $required_yn
 * @property bool $admin_yn
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ModelType $model_type
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\SubmissionFieldValue[] $submission_field_values
 */
class SubmissionField extends Entity
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
        'field_name' => true,
        'label' => true,
        'element_type' => true,
        'enum_options' => true,
        'required_yn' => true,
        'admin_yn' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'model_type' => true,
        'status' => true,
        'submission_field_values' => true,
    ];
}
