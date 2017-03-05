<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [

          [
              'link_name' => '后盾网',
              'link_title' => '后盾网php培训机构',
              'link_url' => 'http://www.houdunwang.com',
              'link_order' => 1,
          ] ,

            [
                'link_name' => '后盾论坛',
                'link_title' => '后盾网，人人做后盾',
                'link_url' => 'http://www.houdunwang.com',
                'link_order' => 2,
            ]

       ];
         DB::table('blog_links')->insert($data);


    }
}
