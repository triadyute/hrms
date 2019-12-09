<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $company = Company::create();
        $company->name = 'Triad Company Ltd.';
        $company->business_type = 'Software Development Company';
        $company->company_overview = $faker->paragraph();
        $company->mission_statement = $faker->sentence();
        $company->address = '11 Campbell Blvd, Kgn 11';
        $company->phone = '+1-555-555-5555';
        $company->email = 'triadcompany@hrportal.com';
        $company->logo = 'AdminLTELogo.png';
        $company->save();
    }
}
