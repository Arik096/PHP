<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubmissionCategory Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $model_type_id
 * @property string $code
 * @property string $title
 * @property string|null $description
 * @property int $status_id
 * @property bool $approved_yn
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentSubmissionCategory $parent_submission_category
 * @property \App\Model\Entity\ModelType $model_type
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\ChildSubmissionCategory[] $child_submission_categories
 * @property \App\Model\Entity\Submission[] $submissions
 */
class SubmissionCategory extends Entity
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
        'parent_id' => true,
        'model_type_id' => true,
        'code' => true,
        'title' => true,
        'description' => true,
        'status_id' => true,
        'approved_yn' => true,
        'created' => true,
        'modified' => true,
        'parent_submission_category' => true,
        'model_type' => true,
        'status' => true,
        'child_submission_categories' => true,
        'submissions' => true,
    ];
}
