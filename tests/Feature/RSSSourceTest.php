<?php

namespace Tests\Feature;

use App\RSSSource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RSSSourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_store_function_saves_a_new_rss_source()
    {
        $data = ['url'=> 'http://www.microsiervos.com/index.xml'];

        $response = $this->post('/api/rss-source', $data);

        $response->assertCreated();
        $rssSource = RSSSource::first();
        $this->assertEquals($rssSource->url, $data['url']);
    }

    public function test_if_function_index_shows_rss_source_saved()
    {
        $this->post('/api/rss-source', $this->rssSourceData());

        $response = $this->get('/api/rss-source');
        $response->assertStatus(200);

        $decodedResponse = $response->json();
        $response->assertExactJson($decodedResponse);
    }

    public function test_if_function_destroy_deletes_the_created_rss_source()
    {
        $this->post('/api/rss-source', $this->rssSourceData());

        $rssSource = RSSSource::first();

        $response = $this->delete('/api/rss-source/' . $rssSource->id);
        $response->assertStatus(200);

        $this->assertDatabaseMissing('r_s_s_sources', $rssSource->toArray());
    }

    private function rssSourceData()
    {
        return ['url'=> 'http://www.microsiervos.com/index.xml'];
    }
}
