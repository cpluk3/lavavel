<?php
use Illuminate\Database\Seeder;
use App\User as User;
  
class UserTableSeeder extends Seeder {
  
    public function run() {
        User::truncate();
        User::create( [
            'name' => 'hedy' ,
            'password' => Hash::make('mingyincollege') ,
        ] );
    }
}
?>
