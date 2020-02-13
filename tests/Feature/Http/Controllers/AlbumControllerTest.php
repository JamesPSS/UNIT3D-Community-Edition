<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AlbumController
 */
class AlbumControllerTest extends TestCase
{


    /**
     * @test
     */
    public function create_returns_an_ok_response()
    {
$this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

$user = factory(\App\Models\User::class)->create();

$response = $this->actingAs($user)->get(route('albums.create'));

$response->assertOk();
$response->assertViewIs('album.create');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function destroy_returns_an_ok_response()
    {
$this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

$album = factory(\App\Models\Album::class)->create();
$user = factory(\App\Models\User::class)->create();

$response = $this->actingAs($user)->delete(route('albums.destroy', ['id' => $album->id]));

$response->assertRedirect(withSuccess('Album has successfully been deleted'));
$this->assertDeleted($albums);

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function index_returns_an_ok_response()
    {
$this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

$user = factory(\App\Models\User::class)->create();

$response = $this->actingAs($user)->get(route('albums.index'));

$response->assertOk();
$response->assertViewIs();

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response()
    {
$this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

$album = factory(\App\Models\Album::class)->create();
$user = factory(\App\Models\User::class)->create();

$response = $this->actingAs($user)->get(route('albums.show', ['id' => $album->id]));

$response->assertOk();
$response->assertViewIs('album.show');
$response->assertViewHas('album');
$response->assertViewHas('albums');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
$this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

$user = factory(\App\Models\User::class)->create();

$response = $this->actingAs($user)->post(route('albums.store'), [
            // TODO: send request data
        ]);

$response->assertRedirect(withErrors('Bad IMDB Request!'));

        // TODO: perform additional assertions
    }

    // test cases...
}