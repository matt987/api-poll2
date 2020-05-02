<?php

use Illuminate\Database\Seeder;
use App\Models;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@polls.com',
          'password' => Hash::make('admin12345'),
          'created_at' => '2020-05-03 00:00:00',
          'updated_at' => '2020-05-03 00:00:00',

      ]);

      DB::table('polls')->insert([
          'title' => 'Poll of voting intention',
          'description' => 'Poll of voting intention for an upcoming US Presidential election.',
          'num_questions' => 3,
          'status' => 1,
          'user_id' => 1,
          'created_at' => '2020-05-03 00:00:00',
          'updated_at' => '2020-05-03 00:00:00',

      ]);

      DB::table('questions')->insert([
          'question' => 'What state are you from?',
          'options' => 'Alabama/Alaska/Arizona/Arkansas/California/Colorado/Connecticut/Delaware/Florida/Georgia/Hawaii/Idaho/Illinois/Indiana/Iowa/Kansas/Kentucky/Louisiana/Maine/Maryland/Massachusetts/Michigan/Minnesota/Mississippi/Missouri/Montana/Nebraska/Nevada/New Hampshire/New Jersey/New Mexico/New York/North Carolina/North Dakota/Ohio/Oklahoma/Oregon/Pennsylvania/Rhode Island/South Carolina/South Dakota/Tennesse/Texas/Utah/Vermont/Virginia/Washington/West Virginia/Wisconsin/Wyoming',
          'display_options' => 'Select',
          'poll_id' => 1,
          'created_at' => '2020-05-03 00:00:00',
          'updated_at' => '2020-05-03 00:00:00',

      ]);

      DB::table('questions')->insert([
          'question' => 'Are you going to vote?',
          'options' => 'Yes/No',
          'display_options' => 'Button',
          'poll_id' => 1,
          'created_at' => '2020-05-03 00:00:00',
          'updated_at' => '2020-05-03 00:00:00',

      ]);

      DB::table('questions')->insert([
          'question' => 'Who are you going to vote for?',
          'options' => 'Ivana Doover/Jeremy Jameson/Steve Lowenthal',
          'display_options' => 'Button',
          'poll_id' => 1,
          'created_at' => '2020-05-03 00:00:00',
          'updated_at' => '2020-05-03 00:00:00',

      ]);

      $responses = [
                      0=> [
                      "id" => 1,
                      "response" => '[{"id_question":1,"response":"Alabama"},{"id_question":2,"response":"Yes"},{"id_question":3,"response":"Jeremy Jameson"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:45:09",
                      "updated_at" => "2020-05-02T18:45:09",
                      "deleted_at" => null,
                    ],
                    1 => [
                      "id" => 2,
                      "response" => '[{"id_question":1,"response":"Arkansas"},{"id_question":2,"response":"Yes"},{"id_question":3,"response":"Ivana Doover"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:45:27",
                      "updated_at" => "2020-05-02T18:45:27",
                      "deleted_at" => null,
                    ],
                    2 => [
                      "id" => 3,
                      "response" => '[{"id_question":1,"response":"Maine"},{"id_question":2,"response":"Yes"},{"id_question":3,"response":"Steve Lowenthal"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:45:36",
                      "updated_at" => "2020-05-02T18:45:36",
                      "deleted_at" => null,
                    ],
                    3 => [
                      "id" => 4,
                      "response" => '[{"id_question":1,"response":"Alabama"},{"id_question":2,"response":"No"},{"id_question":3,"response":"Jeremy Jameson"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:45:47",
                      "updated_at" => "2020-05-02T18:45:47",
                      "deleted_at" => null,
                    ],
                    4 => [
                      "id" => 5,
                      "response" => '[{"id_question":1,"response":"Georgia"},{"id_question":2,"response":"No"},{"id_question":3,"response":"Steve Lowenthal"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:45:58",
                      "updated_at" => "2020-05-02T18:45:58",
                      "deleted_at" => null,
                    ],
                    5 => [
                      "id" => 6,
                      "response" => '[{"id_question":1,"response":"Louisiana"},{"id_question":2,"response":"No"},{"id_question":3,"response":"Ivana Doover"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:46:06",
                      "updated_at" => "2020-05-02T18:46:06",
                      "deleted_at" => null,
                    ],
                    6 => [
                      "id" => 7,
                      "response" => '[{"id_question":1,"response":"Alabama"},{"id_question":2,"response":"Yes"},{"id_question":3,"response":"Jeremy Jameson"}]',
                      "latitude" => "10052",
                      "longitude" => "12541133",
                      "poll_id" => 1,
                      "created_at" => "2020-05-02T18:46:16",
                      "updated_at" => "2020-05-02T18:46:16",
                      "deleted_at" => null,
                    ]
                  ];

                    foreach ($responses as $key => $response) {
                      DB::table('responses')->insert([
                          'response' => $response['response'],
                          'latitude' => $response['latitude'],
                          'longitude' => $response['longitude'],
                          'poll_id' => 1,
                          'created_at' => $response['created_at'],
                          'updated_at' => $response['updated_at'],
                      ]);
                    }
    }
}
