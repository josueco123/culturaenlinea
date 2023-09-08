<?php

use Illuminate\Database\Seeder;

use App\Application;
// use App\Call;
use App\Incentive;
use App\User;
use App\User_type;
use App\Status_type;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incentives = Incentive::count();
        $user_types = User_type::count();
        $status = Status_type::count();

        for ($i=1; $i < 50; $i++) {
            $user = User::find($i);
            $incentive = Incentive::find(rand(1, $incentives));
            $user_type = User_type::find(rand(1, $user_types));

            $application = new Application;
            $application->incentive_id = $incentive->id;
            $application->user_id = $user->id;
            $application->user_type_id = $user_type->id;
            $application->step =7;
            $application->code = $i;
            $application->call_id = 1;
            $application->status_type_id = rand(1, $status);
            $application->save();
        }
    }
}
