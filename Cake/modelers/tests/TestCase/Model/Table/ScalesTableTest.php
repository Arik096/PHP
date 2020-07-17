<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScalesTable Test Case
 */
class ScalesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScalesTable
     */
    protected $Scales;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Scales',
        'app.ModelTypes',
        'app.Submissions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Scales') ? [] : ['className' => ScalesTable::class];
        $this->Scales = TableRegistry::getTableLocator()->get('Scales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Scales);

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
