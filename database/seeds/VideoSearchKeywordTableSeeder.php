<?php

use Illuminate\Database\Seeder;

use App\VideoSearchKeyword;

class VideoSearchKeywordTableSeeder extends Seeder
{
    private $data = [
        [
            'name' => 'Gurbani Kirtan',
            'keywords' => '("gurbani" AND "kirtan") OR ("shabad" AND "kirtan")',
        ],
        [
            'name' => 'Gurbani Katha',
            'keywords' => '("gurbani AND "katha") OR ("kirtan" AND "katha") OR ("gurbani" AND "updesh") OR ("katha" AND "bhai" AND "singh")',
        ],
        [
            'name' => 'Akj Kirtan',
            'keywords' => 'akj kirtan',
        ],
        [
            'name' => 'Sant Baba Dalel Singh Ji Maharaj (Shahabad)',
            'keywords' => 'Sant Dalel Singh',
        ],
        [
            'name' => 'Bhai Amarjit Singh (Patiale Wale)',
            'keywords' => 'Bhai Amarjit Singh',
        ],
        [
            'name' => 'Bhai Anantvir Singh',
            'keywords' => 'Bhai Anantvir Singh'
        ],
        [
            'name' => 'Bhai Amolak Singh',
            'keywords' => 'Bhai Amolak Singh',
        ],
        [
            'name' => 'Bhai Ajit Singh',
            'keywords' => 'Bhai Ajit Singh',
        ],
        [
            'name' => 'Bhai Anikbar Singh',
            'keywords' => 'Bhai Anikbar Singh',
        ],
        [
            'name' => 'Bhai Baldev Singh Wadala',
            'keywords' => 'Bhai Baldev Singh',
        ],
        [
            'name' => 'Bhai Balwinder Singh Lopoke',
            'keywords' => 'Bhai Balwinder Singh',
        ],
        [
            'name' => 'Bhai Balwinder Singh Rangila',
            'keywords' => 'Bhai Balwinder Singh',
        ],
        [
            'name' => 'Bhai Baljeet Singh (USA)',
            'keywords' => 'Bhai Baljeet Singh',
        ],
        [
            'name' => 'Bhai Charamjit Singh Lal',
            'keywords' => 'Bhai Charamjit Singh',
        ],
        [
            'name' => 'Bhai Charanjeet Singh Heera',
            'keywords' => 'Bhai Charanjeet Singh',
        ],
        [
            'name' => 'Bhai Davinder Singh Sodhi (Ludhiane Wale)',
            'keywords' => 'Bhai Davinder Singh',
        ],
        [
            'name' => 'Bhai Dalbir Singh',
            'keywords' => 'Bhai Dalbir Singh',
        ],
        [
            'name' => 'Bhai Dilbagh Singh',
            'keywords' => 'Bhai Dilbagh Singh',
        ],
        [
            'name' => 'Bhai Deshdeep Singh (Chandigarh Wale)',
            'keywords' => 'Bhai Deshdeep Singh',
        ],
        [
            'name' => 'Bhai Gulbagh Singh',
            'keywords' => 'Bhai Gulbagh Singh',
        ],
        [
            'name' => 'Bhai Gurdev Singh',
            'keywords' => 'Bhai Gurdev Singh',
        ],
        [
            'name' => 'Bhai Guriqbal Singh',
            'keywords' => 'Bhai Guriqbal Singh',
        ],
        [
            'name' => 'Bhai Gurpreet Singh (Shimla Wale)',
            'keywords' => 'Bhai Gurpreet Singh',
        ],
        [
            'name' => 'Bhai Gurpreet Singh (Bombay Wale)',
            'keywords' => 'Bhai Gurpreet Singh',
        ],
        [
            'name' => 'Bhai Gurdas Singh',
            'keywords' => 'Bhai Gurdas Singh',
        ],
        [
            'name' => 'Bhai Gurmeet Singh',
            'keywords' => 'Bhai Gurmeet Singh',
        ],
        [
            'name' => 'Bhai Gagandeep Singh (Sri Ganga Nagar Wale)',
            'keywords' => 'Bhai Gagandeep Singh',
        ],
        [
            'name' => 'Bhai Gurcharan Singh - Rasia',
            'keywords' => 'Bhai Gurcharan Singh',
        ],
        [
            'name' => 'Bhai Gurdeep Singh (Kashmir Wale)',
            'keywords' => 'Bhai Gurdeep Singh',
        ],
        [
            'name' => 'Bhai Gurwinder Singh',
            'keywords' => 'Bhai Gurwinder Singh',
        ],
        [
            'name' => 'Bhai Harnaam Singh (Sri nagar wale)',
            'keywords' => 'Bhai Harnaam Singh',
        ],
        [
            'name' => 'Bhai Harbans Singh (Jagadhri Wale)',
            'keywords' => 'Bhai Harbans Singh',
        ],
        [
            'name' => 'Bhai Harjinder Singh (Sri Nagar Wale)',
            'keywords' => 'Bhai Harjinder Singh',
        ],
        [
            'name' => 'Bhai Harvinder Singh',
            'keywords' => 'Bhai Harvinder Singh',
        ],
        [
            'name' => 'Bhai Harcharan Singh Khalsa',
            'keywords' => 'Bhai Harcharan Singh',
        ],
        [
            'name' => 'Bhai Inderjit Singh',
            'keywords' => 'Bhai Inderjit Singh',
        ],
        [
            'name' => 'Bhai Inderjeet Singh',
            'keywords' => 'Bhai Inderjeet Singh',
        ],
        [
            'name' => 'Bhai Jagtar Singh',
            'keywords' => 'Bhai Jagtar Singh',
        ],
        [
            'name' => 'Bhai Jagpal Singh (Kanpur Wale)',
            'keywords' => 'Bhai Jagpal Singh',
        ],
        [
            'name' => 'Bhai Jarnail Singh Damdami Taksal',
            'keywords' => 'Bhai Jarnail Singh',
        ],
        [
            'name' => 'Bhai Jasbir Singh',
            'keywords' => 'Bhai Jasbir Singh',
        ],
        [
            'name' => 'Bhai Jaskaran Singh (Patialae Wale)',
            'keywords' => 'Bhai Jaskaran Singh',
        ],
        [
            'name' => 'Bhai Joga Singh Jogi (Kavishari Jatha)',
            'keywords' => 'Bhai Joga Singh Jogi',
        ],
        [
            'name' => 'Bhai Joginder Singh Riar',
            'keywords' => 'Bhai Joginder Singh',
        ],
        [
            'name' => 'Bhai Jaswant Singh',
            'keywords' => 'Bhai Jaswant Singh',
        ],
        [
            'name' => 'Bhai Jasvinder Singh',
            'keywords' => 'Bhai Jasvinder Singh',
        ],
        [
            'name' => 'Bhai Jaswinder Singh',
            'keywords' => 'Bhai Jaswinder Singh',
        ],
        [
            'name' => 'Bhai Karanvir Singh (UK)',
            'keywords' => 'Bhai Karanvir Singh',
        ],
        [
            'name' => 'Bhai Kamaljeet Singh',
            'keywords' => 'Bhai Kamaljeet Singh',
        ],
        [
            'name' => 'Bhai Kulwant Singh Boparai',
            'keywords' => 'Bhai Kulwant Singh',
        ],
        [
            'name' => 'Bhai Lakhwinder Singh (Hazoori Ragi)',
            'keywords' => 'Bhai Lakhwinder Singh',
        ],
        [
            'name' => 'Bhai Maninder Singh (Hazoori Ragi)',
            'keywords' => 'Bhai Maninder Singh (Hazoori Ragi)',
        ],
        [
            'name' => 'Bhai Manpreet Singh Kanpuri',
            'keywords' => 'Bhai Manpreet Singh Kanpuri',
        ],
        [
            'name' => 'Bhai Mehal Singh (Chandigarh Wale)',
            'keywords' => 'Bhai Mehal Singh',
        ],
        [
            'name' => 'Bhai Mehel Singh (Chandigarh Wale)',
            'keywords' => 'Bhai Mehel Singh',
        ],
        [
            'name' => 'Bhai Mehtab Singh (Kavishri Jatha)',
            'keywords' => 'Bhai Mehtab Singh',
        ],
        [
            'name' => 'Bhai Narinder Singh',
            'keywords' => 'Bhai Narinder Singh',
        ],
        [
            'name' => 'Bhai Nirmal Singh Khalsa',
            'keywords' => 'Bhai Nirmal Singh',
        ],
        [
            'name' => 'Bhai Niranjan Singh',
            'keywords' => 'Bhai Niranjan Singh',
        ],
        [
            'name' => 'Bhai Onkar Singh (Una Sahib Wale)',
            'keywords' => 'Bhai Onkar Singh',
        ],
        [
            'name' => 'Bhai Panthpreet Singh',
            'keywords' => 'Bhai Panthpreet Singh',
        ],
        [
            'name' => 'Bhai Parampreeet Singh (Nathmalpur Wale)',
            'keywords' => 'Bhai Parampreeet Singh',
        ],
        [
            'name' => 'Bhai Pinderpal Singh',
            'keywords' => 'Bhai Pinderpal Singh',
        ],
        [
            'name' => 'Bhai Parminder Singh',
            'keywords' => 'Bhai Parminder Singh',
        ],
        [
            'name' => 'Bhai Ravinder Singh (Hazoori Ragi)',
            'keywords' => 'Bhai Ravinder Singh',
        ],
        [
            'name' => 'Bhai Raam Singh',
            'keywords' => 'Bhai Raam Singh',
        ],
        [
            'name' => 'Bhai Ranjit Singh Chandan (Faridkot Wale)',
            'keywords' => 'Bhai Ranjit Singh Chandan',
        ],
        [
            'name' => 'Bhai Rajinder Singh (Patna Sahib Wale)',
            'keywords' => 'Bhai Rajinder Singh',
        ],
        [
            'name' => 'Bhai Rajinderpal Singh',
            'keywords' => 'Bhai Rajinderpal Singh',
        ],
        [
            'name' => 'Bhai Sahib Singh',
            'keywords' => 'Bhai Sahib Singh',
        ],
        [
            'name' => 'Bhai Sarabjeet Singh',
            'keywords' => 'Bhai Sarabjeet Singh',
        ],
        [
            'name' => 'Bhai Sarwan Singh',
            'keywords' => 'Bhai Sarwan Singh',
        ],
        [
            'name' => 'Bhai Sandhu Singh (Dehradun Wale)',
            'keywords' => 'Bhai Sandhu Singh',
        ],
        [
            'name' => 'Bhai Satinderbir Singh (Hazoori Ragi)',
            'keywords' => 'Bhai Satinderbir Singh',
        ],
        [
            'name' => 'Bhai Satvinder Singh (Delhi Wale)',
            'keywords' => 'Bhai Satvinder Singh',
        ],
        [
            'name' => 'Bhai Satwinder Singh',
            'keywords' => 'Bhai Satwinder Singh',
        ],
        [
            'name' => 'Bhai Sukhjeet Singh',
            'keywords' => 'Bhai Sukhjeet Singh',
        ],
        [
            'name' => 'Bhai Surjan Singh',
            'keywords' => 'Bhai Surjan Singh',
        ],
        [
            'name' => 'Bhai Surinder Singh Mathorao',
            'keywords' => 'Bhai Surinder Singh',
        ],
        [
            'name' => 'Bhai Sulakhan Singh (Hazoori Ragi)',
            'keywords' => 'Bhai Sulakhan Singh',
        ],
        [
            'name' => 'Bhai Swarn Singh Khalsa',
            'keywords' => 'Bhai Swarn Singh',
        ],
        [
            'name' => 'Bhai Tarlochan Singh',
            'keywords' => '"Bhai Tarlochan Singh" OR "Bhai Trilochan Singh"',
        ],
        [
            'name' => 'Bhai Veer Singh',
            'keywords' => 'Bhai Veer Singh',
        ],
        [
            'name' => 'Sant Ranjit Singh (Dhadrian Wale)',
            'keywords' => '"Ranjit Singh Dhadrian Wale" OR "Ranjit Singh Dhadrianwale"',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->data as $row) {
            VideoSearchKeyword::firstOrCreate($row);
        }
    }
}
