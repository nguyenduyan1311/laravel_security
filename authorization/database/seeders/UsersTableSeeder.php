<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        //tao moi admin

        $user = new User();

        $user->name = "adminUser";

        $user->email = "admin@gmail.com";

        $user->password = bcrypt("admin");

        $user->admin = 1;

        $user->save();

        //tao user binh thuong

        $user = new User();

        $user->name = "user";

        $user->email = "user@gmail.com";

        $user->password = bcrypt("user");

        $user->admin = 0;

        $user->save();

    }

}
