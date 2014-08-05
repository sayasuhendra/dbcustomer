<?php

use Mockery as m;
use Way\Tests\Factory;

class BiayalastmilevendorsTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'Biayalastmilevendor');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::biayalastmilevendor(['id' => 1]);
		$this->app->instance('Biayalastmilevendor', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'biayalastmilevendors');

		$this->assertViewHas('biayalastmilevendors');
	}

	public function testCreate()
	{
		$this->call('GET', 'biayalastmilevendors/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'biayalastmilevendors');

		$this->assertRedirectedToRoute('biayalastmilevendors.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'biayalastmilevendors');

		$this->assertRedirectedToRoute('biayalastmilevendors.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'biayalastmilevendors/1');

		$this->assertViewHas('biayalastmilevendor');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'biayalastmilevendors/1/edit');

		$this->assertViewHas('biayalastmilevendor');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'biayalastmilevendors/1');

		$this->assertRedirectedTo('biayalastmilevendors/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'biayalastmilevendors/1');

		$this->assertRedirectedTo('biayalastmilevendors/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'biayalastmilevendors/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
