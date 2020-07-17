<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubmissionFieldValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubmissionFieldValuesTable Test Case
 */
class SubmissionFieldValuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubmissionFieldValuesTable
     */
    protected $SubmissionFieldValues;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SubmissionFieldValues',
        'app.Submissions',
        'app.SubmissionFields',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SubmissionFieldValues') ? [] : ['className' => SubmissionFieldValuesTable::class];
        $this->SubmissionFieldValues = TableRegistry::getTableLocator()->get('SubmissionFieldValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SubmissionFieldValues);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
