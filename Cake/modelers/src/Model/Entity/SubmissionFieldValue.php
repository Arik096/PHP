<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubmissionFieldValue Entity
 *
 * @property int $id
 * @property int $submission_id
 * @property int $submission_field_id
 * @property string $value
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Submission $submission
 * @property \App\Model\Entity\SubmissionField $submission_field
 */
class SubmissionFieldValue extends Entity
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
        'submission_id' => true,
        'submission_field_id' => true,
        'value' => true,
        'created' => true,
        'modified' => true,
        'submission' => true,
        'submission_field' => true,
    ];
}
