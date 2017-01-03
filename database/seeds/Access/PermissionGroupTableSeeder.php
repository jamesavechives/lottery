<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionGroupTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_DRIVER') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_DRIVER') == 'mysql') {
            DB::table(config('access.permission_group_table'))->truncate();
        } elseif (env('DB_DRIVER') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.permission_group_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.permission_group_table') . ' CASCADE');
        }

        /**
         * Create the Access groups
         */
        $group_model            = config('access.group');
        $access                 = new $group_model;
        $access->name           = '后台访问';
        $access->sort           = 1;
        $access->created_at     = Carbon::now();
        $access->updated_at     = Carbon::now();
        $access->save();
        //2
        $group_model            = config('access.group');
        $user                   = new $group_model;
        $user->name             = '用户';
        $user->sort             = 1;
        $user->parent_id        = $access->id;
        $user->created_at       = Carbon::now();
        $user->updated_at       = Carbon::now();
        $user->save();
        //3
        $group_model            = config('access.group');
        $role                   = new $group_model;
        $role->name             = '角色';
        $role->sort             = 2;
        $role->parent_id        = $access->id;
        $role->created_at       = Carbon::now();
        $role->updated_at       = Carbon::now();
        $role->save();
        //4
        $group_model            = config('access.group');
        $permission             = new $group_model;
        $permission->name       = '权限';
        $permission->sort       = 3;
        $permission->parent_id  = $access->id;
        $permission->created_at = Carbon::now();
        $permission->updated_at = Carbon::now();
        $permission->save();
        //5
        $group_model            = config('access.group');
        $article                = new $group_model;
        $article->name          = '文章相关';
        $article->sort          = 1;
        $article->parent_id     = $access->id;
        $article->created_at    = Carbon::now();
        $article->updated_at    = Carbon::now();
        $article->save();

        //6
        $group_model            = config('access.group');
        $Wishes                = new $group_model;
        $Wishes->name          = '祝福语相关';
        $Wishes->sort          = 1;
        $Wishes->parent_id     = $access->id;
        $Wishes->created_at    = Carbon::now();
        $Wishes->updated_at    = Carbon::now();
        $Wishes->save();

        //前端相关7
        $group_model            = config('access.group');
        $frontend               = new $group_model;
        $frontend->name         = '前台访问';
        $frontend->sort         = 1;
        $frontend->created_at   = Carbon::now();
        $frontend->updated_at   = Carbon::now();
        $frontend->save();
        //前端具体8
        $group_model               = config('access.group');
        $zstfrontend               = new $group_model;
        $zstfrontend->name         = '前台文章走势图访问';
        $zstfrontend->sort         = 1;
        $zstfrontend->parent_id    = $frontend->id;
        $zstfrontend->created_at   = Carbon::now();
        $zstfrontend->updated_at   = Carbon::now();
        $zstfrontend->save();

        if (env('DB_DRIVER') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
