<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Submission Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $subject
 * @property int $model_type_id
 * @property int|null $submission_category_id
 * @property int|null $manufacturer_id
 * @property string|null $description
 * @property int $scale_id
 * @property int|null $main_image
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $approved
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ModelType $model_type
 * @property \App\Model\Entity\SubmissionCategory $submission_category
 * @property \App\Model\Entity\Manufacturer $manufacturer
 * @property \App\Model\Entity\Scale $scale
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\SubmissionFieldValue[] $submission_field_values
 */
class Submission extends Entity
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
        'user_id' => true,
        'subject' => true,
        'model_type_id' => true,
        'submission_category_id' => true,
        'manufacturer_id' => true,
        'description' => true,
        'scale_id' => true,
        'main_image' => true,
        'status_id' => true,
        'created' => true,
        'approved' => true,
        'modified' => true,
        'user' => true,
        'model_type' => true,
        'submission_category' => true,
        'manufacturer' => true,
        'scale' => true,
        'status' => true,
        'images' => true,
        'submission_field_values' => true,
    ];
}
