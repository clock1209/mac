<?php

use Illuminate\Database\Seeder;

class PortsNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $portscarrier = array(
          array("name"=>"Shanghái/ China"),
          array("name"=>"Singapur/ Singapur"),
          array("name"=>"Hong Kong/ Hong Kong"),
          array("name"=>"Shenzhen/ China"),
          array("name"=>"Busan/ Corea del Sur"),
          array("name"=>"Ningbo-Zhoushan/ China"),
          array("name"=>"Cantón/ China"),
          array("name"=>"Qingdao/ China"),
          array("name"=>"Dubái/ Emiratos Árabes Unidos"),
          array("name"=>"Róterdam/ Países Bajos"),
          array("name"=>"Tianjin/ China"),
          array("name"=>"Kaohsiung/ TaiwánTaiwan"),
          array("name"=>"Port Klang/ Malasia"),
          array("name"=>"Hamburgo/ Alemania"),
          array("name"=>"Amberes/ Bélgica"),
          array("name"=>"Los Ángeles/ Estados Unidos"),
          array("name"=>"Tanjung Pelepas/ Malasia"),
          array("name"=>"Xiamen/ China"),
          array("name"=>"Dalian/ China"),
          array("name"=>"Long Beach/ Estados Unidos"),
          array("name"=>"Bremen/Bremerhaven/ Alemania"),
          array("name"=>"Laem Chabang/ Tailandia"),
          array("name"=>"Jakarta/ Indonesia"),
          array("name"=>"Nueva York/Nueva Jersey/ Estados Unidos"),
          array("name"=>"Lianyungang/ China"),
          array("name"=>"Suzhou/ China"),
          array("name"=>"Tokio/ Japón"),
          array("name"=>"Ciudad Ho Chi Minh/ Vietnam"),
          array("name"=>"Jawaharlal Nehru (Bombay)/ India"),
          array("name"=>"Valencia/ España"),
          array("name"=>"Colombo/ Sri Lanka"),
          array("name"=>"Yingkou/ China"),
          array("name"=>"Jeddah/ Arabia Saudita"),
          array("name"=>"Puerto Said/ Egipto"),
          array("name"=>"Felixstowe/ Reino Unido"),
          array("name"=>"Algeciras/ España"),
          array("name"=>"Colón/ Panamá"),
          array("name"=>"Manila/ Filipinas"),
          array("name"=>"Balboa/ Panamá"),
          array("name"=>"Khor Fakkan/ Emiratos Árabes Unidos"),
          array("name"=>"Salalah/ Omán"),
          array("name"=>"Yokohama/ Japón"),
          array("name"=>"Santos/ Brasil"),
          array("name"=>"Savannah/ Estados Unidos"),
          array("name"=>"Foshan/ China"),
          array("name"=>"Bandar-Abbas/ Irán"),
          array("name"=>"Durban/ Sudáfrica"),
          array("name"=>"Estambul/ Turquía"),
          array("name"=>"Surabaya/ Indonesia"),
          array("name"=>"Nagoya/ Japón"),
      );

      DB::table('portsname')->insert($portscarrier);
    }
}
