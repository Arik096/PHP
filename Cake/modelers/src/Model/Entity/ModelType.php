<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModelType Entity
 *
 * @property int $id
 * @property string $code
 * @property string $title
 * @property string|null $description
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\SubmissionCategory[] $submission_categories
 * @property \App\Model\Entity\SubmissionField[] $submission_fields
 * @property \App\Model\Entity\Submission[] $submissions
 */
class ModelType extends Entity
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
        'code' => true,
        'title' => true,
        'description' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'submission_categories' => true,
        'submission_fields' => true,
        'submissions' => true,
    ];
}
