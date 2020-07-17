<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property string $original_filename
 * @property string $storage_filename
 * @property string $mime_type
 * @property int $filesize
 * @property string|null $title
 * @property string|null $description
 * @property int|null $submission_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Submission $submission
 * @property \App\Model\Entity\Status $status
 */
class Image extends Entity
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
        'original_filename' => true,
        'storage_filename' => true,
        'mime_type' => true,
        'filesize' => true,
        'title' => true,
        'description' => true,
        'submission_id' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'submission' => true,
        'status' => true,
    ];
}
